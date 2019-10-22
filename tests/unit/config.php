<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

OC_App::loadApp('user_external');
return [
	'imap'=>[
		'run'=>false,
		'mailbox'=>'{imap.gmail.com:993/imap/ssl}INBOX', //see http://php.net/manual/en/function.imap-open.php
		'user'=>'foo',//valid username/password combination
		'password'=>'bar',
	],
	'smb'=>[
		'run'=>false,
		'host'=>'localhost',
		'user'=>'test',//valid username/password combination
		'password'=>'test',
	],
	'ftp'=>[
		'run'=>false,
		'host'=>'localhost',
		'user'=>'test',//valid username/password combination
		'password'=>'test',
	],
];
