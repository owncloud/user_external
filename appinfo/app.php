<?php
## ugly patch for issue #9 https://github.com/owncloud/user_external/issues/9
include_once('../lib/imap.php');
include_once('../lib/smb.php');
include_once('../lib/ftp.php');

/*
OC::$CLASSPATH['OC_User_IMAP']='user_external/lib/imap.php';
OC::$CLASSPATH['OC_User_SMB']='user_external/lib/smb.php';
OC::$CLASSPATH['OC_User_FTP']='user_external/lib/ftp.php';
*/
