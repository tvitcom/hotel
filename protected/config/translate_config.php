<?php

/**
Error: the configuration file is not specified.

USAGE
  yiic message <config-file>

DESCRIPTION
  This command searches for messages to be translated in the specified
  source files and compiles them into PHP arrays as message source.

PARAMETERS
 * config-file: required, the path of the configuration file. You can find
   an example in framework/messages/config.php.

   The file can be placed anywhere and must be a valid PHP script which
   returns an array of name-value pairs. Each name-value pair represents
   a configuration option.

   The following options are available:
*/
return array(
    'sourcePath'=>'/srv/Sites/hotel/webroot',//: string, root directory of all source files.
    'messagePath'=>'/srv/Sites/hotel/webroot/protected/messages',
    //: string, root directory containing message translations.
    'languages'=>array('ru','ua'),//: array, list of language codes that the extracted messages
     //should be translated to. For example, array('zh_cn','en_au').
    'fileTypes'=>array('php'),//: array, a list of file extensions (e.g. 'php', 'xml').
     //Only the files whose extension name can be found in this list
     //will be processed. If empty, all files will be processed.
    'exclude'=>array('vendor','assets'),
    //: array, a list of directory and file exclusions. Each
     //exclusion can be either a name or a path. If a file or directory name
    //or path matches the exclusion, it will not be copied. For example,
    //an exclusion of '.svn' will exclude all files and directories whose
    //name is '.svn'. And an exclusion of '/a/b' will exclude file or
    //directory 'sourcePath/a/b'.
    'translator'=>'Yii::t',//: the name of the function for translating messages.
     //Defaults to 'Yii::t'. This is used as a mark to find messages to be
     //translated. Accepts both string for single function name or array for
    //multiple function names.
    'overwrite'=>true,//: if message file must be overwritten with the merged messages.
    'removeOld'=>true,//: if message no longer needs translation it will be removed,
     //instead of being enclosed between a pair of '@@' marks.
    'sort'=>'odsolete',//: sort messages by key when merging, regardless of their translation
     //state (new, obsolete, translated.)
    'fileHeader'=>false,//: A boolean indicating whether the file should contain a default
     //comment that explains the message file or a string representing
     //some PHP code or comment to add before the return tag in the message file.
);
