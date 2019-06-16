# MicoshLogs

MicoshLogs is a class for simple logging system.

## How to use?

1. Include class in your file:
```
include('MicoshLogs.php');
```
2. Instantiate class
```
$MLogs = new MicoshLogs();
```
3. Log what you want!
```
$MLogs->l('This is my log', 'Notice');
```

## Example usage & output

Example:

```
/** 
 *  Parameters:
 *  #1 Dir for logs, can be dir name or longer path without slash at the end:
 *  'php/logs/mylogs'
 *  'debug/logs'
 *  'logs'
 * #2 (optional) Prefix for log name like cron_log_2019_06_16 or my_own_class_log_2019_06_16
 *  'cron'
 *  'updating_files'
 *  'my_own_class'
 */
$MLog = new MicoshLogs('phplogs', 'TestController');

// ...

/**
 *  Parameters:
 *  #1 Description of log, you can put here strings like:
 *  'Working!'
 *  "\n\nBig Error!\n\n"
 *  #2 (optional) Topic of "log line" for output like [Debug], [Info] or [Operations]:
 * 'Info'
 * 'Debug'
 * 'WorstErrorEver'
 */
$MLog->l('The function of changing some elements in some table has been started!', 'Info');

foreach ($array as $key=>$element)
{
    // ...

    $MLogs->l("Changes in $key element...", "Info");
}

if ($everythingIsOk) {
    $MLogs->l('Everything went perfectly!', 'Success');
} else {
    $err = "It's my fault, I have not finished the code.";
    $MLogs->l("Holy crap, something went wrong! Error message:\n$error", 'Error');
}
```

Output (in: phplogs/TestController_logs_2019_06_16.txt):
```
[2019-06-16 00:39:57] [Info] The function of changing some elements in some table has been started!
[2019-06-16 00:39:59] [Info] Changes in 0 element...
[2019-06-16 00:40:05] [Info] Changes in 1 element...
[2019-06-16 00:40:08] [Info] Changes in 2 element...
[2019-06-16 00:40:13] [Info] Changes in 3 element...
[2019-06-16 00:40:21] [Info] Changes in 4 element...
[2019-06-16 00:40:25] [Info] Changes in 5 element...
[2019-06-16 00:40:30] [Error] Holy crap, something went wrong! Error message:
It's my fault, I have not finished the code.
```
or if we are lucky
```
[2019-06-16 00:39:57] [Info] The function of changing some elements in some table has been started!
[2019-06-16 00:39:59] [Info] Changes in 0 element...
[2019-06-16 00:40:05] [Info] Changes in 1 element...
[2019-06-16 00:40:08] [Info] Changes in 2 element...
[2019-06-16 00:40:13] [Info] Changes in 3 element...
[2019-06-16 00:40:21] [Info] Changes in 4 element...
[2019-06-16 00:40:25] [Info] Changes in 5 element...
[2019-06-16 00:40:30] [Success] Everything went perfectly!
```

