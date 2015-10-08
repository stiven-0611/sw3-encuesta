﻿[CmdletBinding()]
Param (
    [string] $workingDir = (Join-Path "%teamcity.build.workingDir%" "%mr.GitVersion.gitCheckoutDir%"),
    [string] $output = '%mr.GitVersion.output%',
    [string] $outputFile = '%mr.GitVersion.outputFile%',
    [string] $url = '%mr.GitVersion.url%',
    [string] $branch = '%mr.GitVersion.branch%',
    [string] $username = '%mr.GitVersion.username%',
    [string] $password = '%mr.GitVersion.password%',
    [string] $logFile = '%mr.GitVersion.logFile%',
    [string] $exec = '%mr.GitVersion.exec%',
    [string] $execArgs = '%mr.GitVersion.execArgs%',
    [string] $proj = '%mr.GitVersion.proj%',
    [string] $projArgs = '%mr.GitVersion.projArgs%',
    [string] $updateAssemblyInfo = '%mr.GitVersion.updateAssemblyInfo%',
    [string] $updateGitVersion = '%mr.GitVersion.updateGitVersion%'
)

$ErrorActionPreference = "Stop"

function Join-ToWorkingDirectoryIfSpecified($path) {
    $workingDir = "%teamcity.build.workingDir%"
    if ($workingDir -match "teamcity.build.workingDir") {
        return $path
    }
    if (Test-IsSpecified $path) {
        return Join-Path $workingDir $path
    }
    return $path
}

function Test-IsSpecified ($value) {
    if ($value -ne $null -and $value -ne "" -and -not ($value -match "mr.GitVersion.")) {
        return $true
    }
    return $false
}

function Append-IfSpecified($appendTo, $command, $value) {
    if (Test-IsSpecified $value) {
        return "$appendTo /$command '$value'"
    }
    return $appendTo
}

function Build-Arguments() {
    $args = "";
    if (Test-IsSpecified $workingDir) {
        $args = """$workingDir"""
    }
    $args = Append-IfSpecified $args "url" $url
    $args = Append-IfSpecified $args "b" $branch
    $args = Append-IfSpecified $args "u" $username
    $args = Append-IfSpecified $args "p" $password
    $args = Append-IfSpecified $args "output" $output
    $args = Append-IfSpecified $args "l" $logFile
    if (Test-IsSpecified $exec) {
        $args = Append-IfSpecified $args "exec" $exec
        $args = Append-IfSpecified $args "execargs" $execargs
    }
    if (Test-IsSpecified $proj) {
        $args = Append-IfSpecified $args "proj" $proj
        $args = Append-IfSpecified $args "projargs" $projargs
    }
    if ($updateAssemblyInfo -eq "true") {
        $args = "$args /UpdateAssemblyInfo"
    }
    if ($output -eq "json" -and (Test-IsSpecified $outputFile)) {
        $args = "$args > ""$outputFile"""
    }
    return $args
}

try {

    $chocolateyDir = $null
    if ($env:ChocolateyInstall -ne $null) {
        $chocolateyDir = $env:ChocolateyInstall
    } elseif (Test-Path (Join-Path $env:SYSTEMDRIVE Chocolatey)) {
        $chocolateyDir = Join-Path $env:SYSTEMDRIVE Chocolatey
    } elseif (Test-Path (Join-Path ([Environment]::GetFolderPath("CommonApplicationData")) Chocolatey)) {
        $chocolateyDir = Join-Path ([Environment]::GetFolderPath("CommonApplicationData")) Chocolatey
    }
    
    if ($chocolateyDir -eq $null) {
        Write-Host "##teamcity[progressMessage 'Chocolatey not installed; installing Chocolatey']"
        iex ((new-object net.webclient).DownloadString('https://chocolatey.org/install.ps1'))
        $chocolateyDir = Join-Path ([Environment]::GetFolderPath("CommonApplicationData")) Chocolatey
        if (-not (Test-Path $chocolateyDir)) {
            throw "Error installing Chocolatey"
        }
    } else {
        Write-Host "Chocolatey already installed"
    }

    $chocolateyBinDir = Join-Path $chocolateyDir "bin"
    $gitversion = Join-Path $chocolateyBinDir "gitversion.bat"
    if (-not (Test-Path $gitversion)) {
        $gitversion = Join-Path $chocolateyBinDir "gitversion.exe"
    }
	
    $choco = Join-Path (Join-Path $chocolateyDir "chocolateyInstall") "chocolatey.cmd"
	
    if (-not (Test-Path $gitversion)) {
        Write-Host "##teamcity[progressMessage 'GitVersion not installed; installing GitVersion']"
        iex "$choco install gitversion.portable"
        if ($LASTEXITCODE -ne 0) {
            throw "Error installing GitVersion"
        }
    } else {
        Write-Host "GitVersion already installed"
    }

    if ($updateGitVersion -eq "true") {
        Write-Host "##teamcity[progressMessage 'Checking for updated version of GitVersion']"
        iex "$choco update gitversion.portable"
        if ($LASTEXITCODE -ne 0) {
            throw "Error updating GitVersion"
        }
    } else {
        Write-Host "GitVersion will not be updated"
    }	

    $outputFile = Join-ToWorkingDirectoryIfSpecified $outputFile
    $logFile = Join-ToWorkingDirectoryIfSpecified $logFile
    $exec = Join-ToWorkingDirectoryIfSpecified $exec
    $proj = Join-ToWorkingDirectoryIfSpecified $proj

    $arguments = Build-Arguments
    $safeArgs = $arguments.Replace($password, "*****").Replace("'", """")
    Write-Host "##teamcity[progressMessage 'Running: $gitversion $safeArgs']"
    iex "$gitversion $arguments"
    if ($LASTEXITCODE -ne 0) {
        throw "Error running GitVersion"
    }
}
catch {
    Write-Host "##teamcity[buildStatus text='$_' status='FAILURE']"
    Write-Host "##teamcity[message text='$_' status='ERROR']"
    exit 1
}
