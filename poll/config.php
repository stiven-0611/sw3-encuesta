<?php

require_once(dirname(__FILE__) . '/class.php');	// For the Poll class definition

// Modify this string to reflect the URL where DRBPoll is installed.
// A trailing slash must be included.  This URL will be used in the generated 
// HTML for the URL for the form submission.  This may be a relative or 
// absolute URL.
$POLL_URL = 'poll/';

// Names of the form input elements in the poll form.
// You probably won't need to change these unless the names conflict with some 
// other element on your pages.
$POLL_ID_PARAM_NAME = "pollid";
$VOTE_PARAM_NAME = "vote";

// Maximum width of a bar of the poll results, in pixels
// Change this if you want to make the poll bar chart larger 
// or smaller in width.
$MAX_POLL_BAR_WIDTH = 200;

// Whether or not the script should prevent the same IP address 
// from voting multiple times on the same poll.
// Set to FALSE to allow duplicate votes.  
$PREVENT_DUPLICATE_VOTES = TRUE;

// Whether or not vote counts should be displayed. 
// If set to FALSE, only the percentages will be shown.  
$SHOW_COUNTS = TRUE;

// These are the strings that are displayed in the poll control 
// and the result page.
// Modify these to customize what is displayed to the user.
$SUBMIT_BUTTON_STRING = 'Submit';
$NUMBER_OF_VOTES_STRING = 'Total votes: %s';
$VOTE_STRING = 'Vote:';						// Used as label for combobox control type
$VOTE_LIST_DEFAULT_LABEL = 'Please Select';	// This is the "empty" option when using a combobox
$VIEW_RESULTS_STRING = 'Current Results';
$DUPLICATE_VOTE_ERROR_MSG = 'You have already voted!';
$NO_VOTE_SELECTED_ERROR_MSG = 'You forgot to select a value!';



$VALID_POLLS = array();	// The keys of this associative array are the poll IDs

// First poll definition
$p = new Poll;
$p->question = "Valore los procesos de inducción que la Universidad realiza a los estudiantes que ingresan a primer semestre, con respecto a su calidad";	// Question displayed to the user
$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 1";						// Form legend; leave empty for none
$p->control_type = $CONTROL_COMBOBOX;	// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. excelente");						// Poll value ID and a display string
$p->add_value("2", "b. regular");
$p->add_value("3", "c. deficiente");
$p->add_value("4", "e. no sabe");
$VALID_POLLS["1"] = $p;							// "1" is the poll ID

// Second poll definition
$p = new Poll;
$p->question = "Califique la confiabilidad  de los procedimientos de admisión (selección de nuevos estudiantes, intercambios, transferencia, reingreso).";				// Question displayed to the user
$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "pregunta 2";						// Form legend; leave empty for none
$p->control_type = $CONTROL_COMBOBOX;			// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Totalmente confiables");				// Poll value ID and a display string
$p->add_value("2", "b. Confiables");
$p->add_value("3", "c. Medianamente confiables");
$p->add_value("4", "d. Poco confiables");
$VALID_POLLS["2"] = $p;							// "2" is the poll ID

// Third poll definition
$p = new Poll;
$p->question = "Respecto a los procedimientos para la matricula académica (registro de asignaturas) y financiera  (pago del valor de la matrícula), considera que son CLaros";	// Question displayed to the user
$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 3";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. totalmente");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. parcialmente");
$p->add_value("3", "c. no es claro");
$VALID_POLLS["3"] = $p;	

$p = new Poll;
$p->question = "¿Ha participado de los programas de intercambio estudiantil?";	// Question displayed to the user
$p->returnToURL = "../example2.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 4";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. si");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. No");
$p->add_value("3", "c. No me he enterado");
$VALID_POLLS["4"] = $p;	

$p = new Poll;
$p->question = "Califique las facilidades de crédito ofrecidas por la Universidad del Quindío y por otras instituciones en convenio (ICETEX, bancos, corporaciones, etc.)";	// Question displayed to the user
$p->returnToURL = "../example2.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 5";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Muy adecuadas");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Adecuadas");
$p->add_value("3", "c. Medianamente adecuadas");
$p->add_value("3", "c. Inadecuado");
$VALID_POLLS["5"] = $p;	

$p = new Poll;
$p->question = "Teniendo en cuenta que la interdisciplinariedad es la interacción de diferentes profesiones para la comprensión integral de los fenómenos sociales y naturales, califique según la Política Académico-Curricular de la Universidad, la interdisciplinariedad en cuanto a grado de aplicación";	// Question displayed to the user
$p->returnToURL = "../example2.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 6";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Alto");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Medio");
$p->add_value("3", "c. Bajo");
$p->add_value("4", "c. No sabe");
$VALID_POLLS["6"] = $p;	

$p = new Poll;
$p->question = "¿En qué grado contribuyen las prácticas académicas, de campo, de laboratorio y profesionales a su formación profesional?";	// Question displayed to the user
$p->returnToURL = "../example3.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 7";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Sobresaliente");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Bueno");
$p->add_value("3", "c. Aceptable");
$p->add_value("4", "d. Insuficiente");
$p->add_value("5", "e. No sabe");
$VALID_POLLS["7"] = $p;

$p = new Poll;
$p->question = "Evalúe el grado en que la estructura organizacional de la Universidad (rectoría, vicerrectorías, facultades, programas, consejos y comités y dependencias administrativas) facilita el adecuado desempeño de sus funciones";	// Question displayed to the user
$p->returnToURL = "../example3.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 8";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Sobresaliente");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Bueno");
$p->add_value("3", "c. Aceptable");
$p->add_value("4", "d. Insuficiente");
$VALID_POLLS["8"] = $p;

$p = new Poll;
$p->question = "Califique los órganos de gobierno de la Institución (Consejos Superior, Académico, de Facultad y Curriculares), en cuanto a Estructura:";	// Question displayed to the user
$p->returnToURL = "../example3.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 9";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Muy adecuada");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Adecuada");
$p->add_value("3", "c. Medianamente adecuada");
$p->add_value("4", "d. Inadecuada");
$VALID_POLLS["9"] = $p;

$p = new Poll;
$p->question = "Califique los órganos de gobierno de la Institución (Consejos Superior, Académico, de Facultad y Curriculares), en cuanto a confiabilidad:";	// Question displayed to the user
$p->returnToURL = "../example4.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 10";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Totalmente confiables");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Confiables");
$p->add_value("3", "c. Medianamente confiables");
$p->add_value("4", "d. Poco confiables");
$VALID_POLLS["10"] = $p;

$p = new Poll;
$p->question = "¿Con qué frecuencia promedio utiliza las bases de datos y bibliotecas digitales de la Institución?";	// Question displayed to the user
$p->returnToURL = "../example4.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 11";						// Form legend; leave empty for none
$p->control_type = $CONTROL_COMBOBOX;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Diariamente");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Dos o tres veces por semana");
$p->add_value("3", "c. Una vez por semana");
$p->add_value("4", "d. Cada quince días");
$p->add_value("5", "e. Una vez por mes");
$p->add_value("6", "f. Cada seis meses");
$p->add_value("7", "g. Una vez por año");
$VALID_POLLS["11"] = $p;

$p = new Poll;
$p->question = "Califique la calidad de los servicios prestados por la Biblioteca Central a través de las bases de datos y bibliotecas digitales";	// Question displayed to the user
$p->returnToURL = "../example4.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 12";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "a. Excelente");	// You may include the optional URL parameter to create a link
$p->add_value("2", "b. Buena");
$p->add_value("3", "c. Regular");
$p->add_value("4", "d. Deficiente");
$VALID_POLLS["12"] = $p;

?>
