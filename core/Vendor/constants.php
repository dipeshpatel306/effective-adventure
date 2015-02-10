<?php
//NOTE: Changes here may also require changes in constants.js on the HIPAA Web Host 
// (https://www.quickbase.com/db/be85ufshd?a=dbpage&pagename=constants.js)

define("RECORD_ID", '3');

define("QB_ADMIN_USER", "info@entegration.net");
define("QB_ADMIN_PASS", "hipaaus3r2");

define('SQL_USER', 'hipaa_admin');
define('SQL_PASS', 'trustno1');

define('AWS_ACCESS_KEY', 'AKIAIL6SHFTZG4UE6GZA');
define('AWS_SECRET_KEY', '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');

define('MDL_PASSWORD', 'HSNM00dle11!');

define('PORTAL_ROOT', 'https://www.hipaasecurenow.com/');
define('WEB_HOST_ROOT', 'https://www.quickbase.com/db/be85ufshd');
define('APP_ROOT', 'https://www.quickbase.com/db/bfwchuiwm');

define("INIT_DURATION", '60'); //days

define('PARTNER_ED_CENTER_PAGE_ID', '25');
define('PARTNER_INFO_CENTER_PAGE_ID', '26');
define('PARTNER_SOCIAL_CENTER_PAGE_ID', '28');
//dbids
define("USERS_DBID", "bfwcks3fi");
define("CLIENTS_DBID", "bfwcygmfa");
define("SI_DBID", "bfwchuixq");
define("RA_QUESTIONS_DBID", "bfwchuixn");
define("RA_ANSWERS_DBID", "bfwc35hpr");
define("ORG_INFO_DBID", "bfyavg5de");
define("HIPAA_POLICIES_DBID", "bfydbdz58");
define("MESSAGES_DBID", "bgc3thsss");
define("PARTNERS_DBID", "bgxzkrfbf");

define("BAA_DBID", "bger3mzc3");
define("DRP_DBID", "bger5rj99");
define("RA_DBID", "bger6q7fd");
define("OCND_DBID", "bger7nt36");
define("EPHIREM_DBID", "bger8j9jh");
define("EPHIREC_DBID", "bger9qidx");
define("SRA_DBID", "bgesaihjz");
define("HPNP_DBID", "bgesa45cc");
define("OPNP_DBID", "bgeui3p5p");

//roles
define("ROLE_INIT_ADMIN", '3');
define("ROLE_COMP_ADMIN", '2');
define("ROLE_EMPLOYEE", '4');
define("ROLE_PARTNER_ADMIN" , '5');
define("ROLE_PARTNER_EMPLOYEE", '6');
define("ROLE_MEANINGFUL_USE_ADMIN", '7');
define("ROLE_MEANINGFUL_USE_EMPLOYEE", '8');

//field ids (only used fields are defined)
//In QB: Customize->Tables select a table and on 'Fields' tab click "Show Field IDs"

//users
define("USERS_FIRST_NAME", '8');
define("USERS_LAST_NAME", '9');
define("USERS_FULL_NAME", '19');
define("USERS_EMAIL_ADDRESS", '10');
define("USERS_PHONE_NUMBER", '12');
define("USERS_CELL_PHONE", '13');
define("USERS_RELATED_ROLE", '23');
define("USERS_RELATED_CLIENT", '15');
define("USERS_CLIENT_NAME", '16');
define("USERS_PASSWORD", '27');
define("USERS_EMAIL_VALIDATED", '28');
define("USERS_ACTIVE_IND", '33'); 
define("USERS_ACTIVE", '34');
define("USERS_VALIDATION_CODE", '29');

//clients
define("CLIENTS_NAME", '6');
define("CLIENTS_CONTACT_EMAIL", '22');
define("CLIENTS_ADMIN_CODE", '18');
define("CLIENTS_USER_CODE", '19');
define("CLIENTS_START_DATE", '24');
define("CLIENTS_SERVICE_TYPE", '17');
define("CLIENTS_PROMOTION_DATE", '25');
define("CLIENTS_ACTIVE_DURATION", '27');
define("CLIENTS_MOODLE_COURSE_ID", '28');
define("CLIENTS_PARTNER_ID", '51');
define("CLIENTS_ACTIVE", '26');
define("CLIENTS_PARTNER_NAME", '52');
define("CLIENTS_RELATED_PARTNER", '51');

//partners
define("PARTNERS_NAME", '6');
define("PARTNERS_EMAIL", '7');
define("PARTNERS_LINK", '10');
define("PARTNERS_LOGO", '16');
define("PARTNERS_PASSWORD", '8');
define("PARTNERS_ACTIVE", '13');

//RA answers
define("RA_ANSWERS_RELATED_CLIENT", '15');
define("RA_ANSWERS_NUM", '9');
define("RA_ANSWERS_CTRL_IMPL", '7');

//RA Questions
define("RA_QUESTIONS_NUM", '9');

//Security Incidents
define("SI_RELATED_CLIENT", '22');

// Business Associate Agreements
define("BAA_RELATED_CLIENT", "30");

// Disaster Recovery Plans
define("DRP_RELATED_CLIENT", "21");

// Risk Assessments
define("RA_RELATED_CLIENT", "21");

// Other Contracts & Documents
define("OCND_RELATED_CLIENT", "21");

// ePHI Removed
define("EPHIREM_RELATED_CLIENT", "15");

// ePHI Received
define("EPHIREC_RELATED_CLIENT", "25");

// Server Room Access
define("SRA_RELATED_CLIENT", "19");

// HIPAA Policy & Procedures
define("HPNP_RELATED_CLIENT", "6");
define("HPNP_RELATED_HIPAA", "8");

// Other Policy & Procedures
define("OPNP_RELATED_CLIENT", "21");

//Organization Info
define("ORG_INFO_RELATED_CLIENT", '54');

//Risk Assessment Tool - Vulnerabilities & Controls
define("VUL_AND_CTRL_QUESTION_NUM", '19');
define("VUL_AND_CTRL_IMPL", '10');

//Messages
define("MESSAGES_RELATED_USER", '8');
define("MESSAGES_MESSAGE", '6');

//Automated Emails
define("MAIL_FROM", "From: HIPAA Compliance Portal <no-reply@hipaasecurenow.com>");
define("MAIL_HEADERS", MAIL_FROM . "\r\n" . "MIME-Version 1.0" . "\r\n" . "Content-type: text/html; charset=iso-8859-1");
?>