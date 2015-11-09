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
$p->question = "De la lista de enunciados que aparecen a continuación señale tres (3) de ellos que según usted  
				reflejan más fielmente el sentido de la Misión de la Universidad. En caso de no conocer la misión de la 
				Universidad deje la pregunta en blanco y continúe en la pregunta 3.?";	// Question displayed to the user
$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Pregunta 1";						// Form legend; leave empty for none
$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "Educar personas integras con capacidad de liderazgo.");						// Poll value ID and a display string
$p->add_value("2", "Permitir a la comunidad del Eje Cafetero la oportunidad de acceder al conocimiento");
$p->add_value("3", "Desafíos, sueños y compromisos");
$p->add_value("4", "Formar para el empleo en la región");
$p->add_value("5", "La consolidación de grupos de investigación y redes de cooperación");
$p->add_value("6", "Formar profesionales con sentido humano, creativo e investigativo");
$p->add_value("7", "Formar ciudadanos comprometidos con el conocimiento y la democracia");
$p->add_value("8", "Crear sentido de pertenencia en todos los miembros de la comunidad universitaria");
$p->add_value("9", "Facilitar la articulación con la sociedad quindiana para propiciar el desarrollo");
$p->add_value("10", "Formar profesionales con sentido humano comprometidos con el desarrollo cultural, científico y tecnológico de la región y del país");
$p->add_value("11", "La consolidación de la cultura y el desarrollo de competencias productivas");
$p->add_value("12", "Ser líder del desarrollo económico, social y político de la región y del país");
$p->add_value("13", "Producir y aplicar conocimiento en el entorno social");
$VALID_POLLS["1"] = $p;							// "1" is the poll ID

// Second poll definition
$p = new Poll;
$p->question = "How old are you?";				// Question displayed to the user
$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
$p->legend = "Second Poll";						// Form legend; leave empty for none
$p->control_type = $CONTROL_COMBOBOX;			// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
$p->add_value("1", "0-15 years");				// Poll value ID and a display string
$p->add_value("2", "16-20 years");
$p->add_value("3", "21-30 years");
$p->add_value("4", "31-40 years");
$p->add_value("5", "41-50 years");
$p->add_value("6", "50+ years");
$VALID_POLLS["2"] = $p;							// "2" is the poll ID

// Third poll definition
//$p = new Poll;
//$p->question = "What is your favorite PHP script?";	// Question displayed to the user
//$p->returnToURL = "../example.php";				// Specify the URL to return to for this poll; may be relative or absolute
//$p->legend = "Third Poll";						// Form legend; leave empty for none
//$p->control_type = $CONTROL_RADIOBUTTONS;		// Control type; $CONTROL_RADIOBUTTONS or $CONTROL_COMBOBOX
//$p->add_value("1", "PHP Guestbook", "http://www.dbscripts.net/guestbook/");	// You may include the optional URL parameter to create a link
//$p->add_value("2", "PHP Poll", "http://www.dbscripts.net/poll/");
//$p->add_value("3", "PHP Image Gallery", "http://www.dbscripts.net/imagegallery/");
//$p->add_value("4", "PHP Ratings", "http://www.dbscripts.net/ratings/");
//$VALID_POLLS["3"] = $p;	

?>
