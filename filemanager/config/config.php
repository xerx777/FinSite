<?php
$version = "9.14.0";
if (session_id() == '') {
    session_start();
}

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');
ob_start('mb_output_handler');
date_default_timezone_set('Europe/Rome');
setlocale(LC_CTYPE, 'en_US'); //correct transliteration

/*
|--------------------------------------------------------------------------
| Optional security
|--------------------------------------------------------------------------
|
| if set to true only those will access RF whose url contains the access key(akey) like:
| <input type="button" href="../filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey" value="Files">
| in tinymce a new parameter added: filemanager_access_key:"myPrivateKey"
| example tinymce config:
|
| tiny init ...
| external_filemanager_path:"../filemanager/",
| filemanager_title:"Filemanager" ,
| filemanager_access_key:"myPrivateKey" ,
| ...
|
*/

define('USE_ACCESS_KEYS', false); // TRUE or FALSE

/*
|--------------------------------------------------------------------------
| DON'T COPY THIS VARIABLES IN FOLDERS config.php FILES
|--------------------------------------------------------------------------
*/

define('DEBUG_ERROR_MESSAGE', false); // TRUE or FALSE

/*
|--------------------------------------------------------------------------
| Path configuration
|--------------------------------------------------------------------------
| In this configuration the folder tree is
| root
|    |- source <- upload folder
|    |- thumbs <- thumbnail folder [must have write permission (755)]
|    |- filemanager
|    |- js
|    |   |- tinymce
|    |   |   |- plugins
|    |   |   |   |- responsivefilemanager
|    |   |   |   |   |- plugin.min.js
*/

$config = array(

    /*
    |--------------------------------------------------------------------------
    | DON'T TOUCH (base url (only domain) of site).
    |--------------------------------------------------------------------------
    |
    | without final / (DON'T TOUCH)
    |
    */
    'base_url' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'],
    /*
    |--------------------------------------------------------------------------
    | path from base_url to base of upload folder
    путь от base_url к базе папки загрузки
    |--------------------------------------------------------------------------
    |
    | with start and final /
    |
    */
    'upload_dir' => '/upload/',
    /*
    |--------------------------------------------------------------------------
    | relative path from filemanager folder to upload folder
    относительный путь от папки файлового менеджера к папке загрузки
    |--------------------------------------------------------------------------
    |
    | with final /
    |
    */
    'current_path' => '../upload/',

    /*
    |--------------------------------------------------------------------------
    | relative path from filemanager folder to thumbs folder
    относительный путь от папки filemanager к папке thumbs
    |--------------------------------------------------------------------------
    |
    | with final /
    | DO NOT put inside upload folder
    НЕ помещайте в папку загрузки
    |
    */
    'thumbs_base_path' => '../thumbs/',

    /*
    |--------------------------------------------------------------------------
    | path from base_url to base of thumbs folder
     путь от папки filemanager к папке thumbs
    |--------------------------------------------------------------------------
    |
    | with final /
    | DO NOT put inside upload folder
    НЕ помещайте в папку загрузки
    |
    */
    'thumbs_upload_dir' => '/thumbs/',


    /*
    |--------------------------------------------------------------------------
    | mime file control to define files extensions
    элемент управления файлом mime для определения расширений файлов
    |--------------------------------------------------------------------------
    |
    | Если вы хотите, чтобы вам назначили расширение, начиная с типа mime
    |
    */
    'mime_extension_rename'	=> true,


    /*
    |--------------------------------------------------------------------------
    | FTP configuration BETA VERSION
    |--------------------------------------------------------------------------
    |
    | If you want enable ftp use write these parametres otherwise leave empty
    | Remember to set base_url properly to point in the ftp server domain and
    | upload dir will be ftp_base_folder + upload_dir so without final 
    Если вы хотите включить использование ftp, укажите эти параметры, в противном случае оставьте поле пустым.
     | Не забудьте правильно установить base_url, чтобы он указывал на домен ftp-сервера и
     | каталог загрузки будет ftp_base_folder + upload_dir, поэтому без окончательного/
    |
    */
    'ftp_host'         => false, //put the FTP host  поставить FTP-хост
    'ftp_user'         => "user",
    'ftp_pass'         => "pass",
    'ftp_base_folder'  => "base_folder",
    'ftp_base_url'     => "http://site to ftp root",
    // Directory where place files before to send to FTP with final 
    //Каталог, в который помещаются файлы перед отправкой на FTP с окончательной/
    'ftp_temp_folder'  => "../temp/",
    /*
    |---------------------------------------------------------------------------
    | path from ftp_base_folder to base of thumbs folder with start and final 
    путь от ftp_base_folder к базе папки thumbs с начальным и конечным /
    |---------------------------------------------------------------------------
    */
    'ftp_thumbs_dir' => '/thumbs/',
    'ftp_ssl' => false,
    'ftp_port' => 21,

    /* EXAMPLE
    'ftp_host'         => "host.com",
    'ftp_user'         => "test@host.com",
    'ftp_pass'         => "pass.1",
    'ftp_base_folder'  => "",
    'ftp_base_url'     => "http://host.com/testFTP",
    */

    /*
    |--------------------------------------------------------------------------
    | Multiple files selection 
    Выбор нескольких файлов
    |--------------------------------------------------------------------------
    | The user can delete multiple files, select all files , deselect all files
    Пользователь может удалить несколько файлов, выбрать все файлы, отменить выбор всех файлов.
    */
    'multiple_selection' => true,

    /*
    |
    | The user can have a select button that pass a json to external input or pass the first file selected to editor
    | If you use responsivefilemanager tinymce extension can copy into editor multiple object like images, videos, audios, links in the same time
    у пользователя может быть кнопка выбора, которая передает json на внешний ввод или передает первый выбранный файл редактору
     | Если вы используете расширение responseivefilemanager, tinymce может копировать в редактор несколько объектов, таких как изображения, видео, аудио, ссылки одновременно.
    |
     */
    'multiple_selection_action_button' => true,

    /*
    |--------------------------------------------------------------------------
    | Access keys
    |--------------------------------------------------------------------------
    |
    | add access keys eg: array('myPrivateKey', 'someoneElseKey');
    | keys should only containt (a-z A-Z 0-9 \ . _ -) characters
    | if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
    | $username = 'Admin';
    | $salt = 'dsflFWR9u2xQa' (a hard coded string)
    | $akey = md5($username.$salt);
    | DO NOT use 'key' as access key!
    | Keys are CASE SENSITIVE!
    |

      добавить ключи доступа, например: array ('myPrivateKey', 'somethingElseKey');
     | ключи должны содержать только символы (a-z A-Z 0-9 \. _ -)
     | Если вы интегрируете, скажем, cms для администраторов, я рекомендую сделать ключи рандомизированными примерно так:
     | $ username = 'Админ';
     | $ salt = 'dsflFWR9u2xQa' (жестко закодированная строка)
     | $ akey = md5 ($ username. $ salt);
     | НЕ используйте «ключ» в качестве ключа доступа!
     | Ключи чувствительны к регистру!
    */

    'access_keys' => array(),

    //--------------------------------------------------------------------------------------------------------
    // YOU CAN COPY AND CHANGE THESE VARIABLES INTO FOLDERS config.php FILES TO CUSTOMIZE EACH FOLDER OPTIONS
    //ВЫ МОЖЕТЕ КОПИРОВАТЬ И ИЗМЕНИТЬ ЭТИ ПЕРЕМЕННЫЕ В ФАЙЛЫ ПАПКИ config.php, ЧТОБЫ НАСТРОИТЬ КАЖДУЮ ПАПКУ
    //--------------------------------------------------------------------------------------------------------

    /*
    |--------------------------------------------------------------------------
    | Maximum size of all files in source folder
    Максимальный размер всех файлов в исходной папке
    |--------------------------------------------------------------------------
    |
    | in Megabytes
    |
    */
    'MaxSizeTotal' => false,

    /*
    |--------------------------------------------------------------------------
    | Maximum upload size
    |--------------------------------------------------------------------------
    |
    | in Megabytes
    |
    */
    'MaxSizeUpload' => 10,

    /*
    |--------------------------------------------------------------------------
    | File and Folder permission
    Разрешение файла и папки
    |--------------------------------------------------------------------------
    |
    */
    'filePermission' => 0777,
    'folderPermission' => 0777,


    /*
    |--------------------------------------------------------------------------
    | default language file name
    |--------------------------------------------------------------------------
    */
    'default_language' => "ru",

    /*
    |--------------------------------------------------------------------------
    | Icon theme
    Тема значка
    |--------------------------------------------------------------------------
    |
    | Default available: ico and ico_dark
    | Can be set to custom icon inside filemanager/img
    Доступен default: ico и ico_dark
     | Может быть установлен на собственный значок внутри файлового менеджера / img
    |
    */
    'icon_theme' => "ico",


    //Show or not total size in filemanager (is possible to greatly increase the calculations)
    // показывать или нет общий размер в файловом менеджере (можно сильно увеличить вычисления)
    'show_total_size'						=> false,
    //Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
    // Показывать или не показывать размер папки в представлении списка в файловом менеджере (возможно, если есть большая папка, для значительного увеличения вычислений)
    'show_folder_size'						=> false,
    //Show or not show sorting feature in filemanager
    // Показывать или не показывать функцию сортировки в файловом менеджере
    'show_sorting_bar'						=> true,
    //Show or not show filters button in filemanager
    'show_filter_buttons'                   => true,
    //Show or not language selection feature in filemanager
    // Показать или нет функцию выбора языка в файловом менеджере
    'show_language_selection'				=> true,
    //active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
    // включить или выключить транслитерацию (означает преобразовать все странные символы в символы A..Za..z0..9)
    'transliteration'						=> false,
    //convert all spaces on files name and folders name with $replace_with variable
    // преобразовать все пробелы в имени файла и имени папок с помощью переменной $ replace_with
    'convert_spaces'						=> false,
    //convert all spaces on files name and folders name this value
    //преобразовать все пробелы в имени файлов и папок в имя этого значения
    'replace_with'							=> "_",
    //convert to lowercase the files and folders name
    //преобразовать в нижний регистр имена файлов и папок
    'lower_case'							=> false,

    //Add ?484899493349 (time value) to returned images to prevent cache
    //Добавьте? 484899493349 (значение времени) к возвращаемым изображениям, чтобы предотвратить кеширование
    'add_time_to_img'                       => false,


    //*******************************************
    //Images limit and resizing configuration
    //Ограничение изображений и конфигурация изменения размера
    //*******************************************

    // set maximum pixel width and/or maximum pixel height for all images
    //установить максимальную ширину в пикселях и / или максимальную высоту в пикселях для всех изображений
    // If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected
    //Если вы установите максимальную ширину или высоту, негабаритные изображения преобразуются в эти пределы. Изображения меньше установленного лимита не затрагиваются.
    // if you don't need a limit set both to 0
    //если вам не нужен предел, установите оба значения на 0
    'image_max_width'                         => 0,
    'image_max_height'                        => 0,
    'image_max_mode'                          => 'auto',
    /*
    #  $option:  0 / exact = defined size;
    #            1 / portrait = keep aspect set height;
    #            2 / landscape = keep aspect set width;
    #            3 / auto = auto;
    #            4 / crop= resize and crop;
    */

    //Automatic resizing //
    // If you set $image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension
    //Если вы установите для $ image_resizing значение TRUE, скрипт преобразует все загруженные изображения точно в размер image_resizing_width x image_resizing_height.
    // If you set width or height to 0 the script automatically calculates the other dimension
    //Если вы установите ширину или высоту равными 0, скрипт автоматически вычислит другое измерение.
    // Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit
    //Возможно, что если вы загружаете очень большие изображения, скрипт не сработает, чтобы преодолеть это увеличение конфигурации памяти и ограничения времени php
    'image_resizing'                          => false,
    'image_resizing_width'                    => 0,
    'image_resizing_height'                   => 0,
    'image_resizing_mode'                     => 'auto', // same as $image_max_mode
    'image_resizing_override'                 => false,
    // If set to TRUE then you can specify bigger images than $image_max_width & height otherwise if image_resizing is
    // bigger than $image_max_width or height then it will be converted to those values
    //Если установлено значение TRUE, вы можете указать изображения большего размера, чем $ image_max_width & height, в противном случае, если image_resizing равно  больше, чем $ image_max_width или height, тогда он будет преобразован в эти значения


    //******************
    //
    // WATERMARK IMAGE    ИЗОБРАЖЕНИЕ ВОДЯНОЙ МАРКИ
    //
    //Watermark path or false
    'image_watermark'                          => false,//"../watermark.png",
    # Could be a pre-determined position such as:
    #           tl = top left,
    #           t  = top (middle),
    #           tr = top right,
    #           l  = left,
    #           m  = middle,
    #           r  = right,
    #           bl = bottom left,
    #           b  = bottom (middle),
    #           br = bottom right
    #           Or, it could be a co-ordinate position such as: 50x100
    'image_watermark_position'                 => 'br',
    # padding: If using a pre-determined position you can
    #         adjust the padding from the edges by passing an amount
    #         in pixels. If using co-ordinates, this value is ignored.
    'image_watermark_padding'                 => 10,

    //******************
    // Default layout setting
    //
    // 0 => boxes
    // 1 => detailed list (1 column)
    // 2 => columns list (multiple columns depending on the width of the page)
    // YOU CAN ALSO PASS THIS PARAMETERS USING SESSION VAR => $_SESSION['RF']["VIEW"]=
    //
    //******************
    'default_view'                            => 0,

    //set if the filename is truncated when overflow first row
    'ellipsis_title_after_first_row'          => true,

    //*************************
    //Permissions configuration
    //******************
    'delete_files'                            => true,
    'create_folders'                          => true,
    'delete_folders'                          => true,
    'upload_files'                            => true,
    'rename_files'                            => true,
    'rename_folders'                          => true,
    'duplicate_files'                         => true,
    'extract_files'                           => true,
    'copy_cut_files'                          => true, // for copy/cut files
    'copy_cut_dirs'                           => true, // for copy/cut directories
    'chmod_files'                             => true, // change file permissions
    'chmod_dirs'                              => true, // change folder permissions
    'preview_text_files'                      => true, // eg.: txt, log etc.
    'edit_text_files'                         => true, // eg.: txt, log etc.
    'create_text_files'                       => true, // only create files with exts. defined in $config['editable_text_file_exts']
    'download_files'			  => true, // allow download files or just preview
    //разрешить скачивание файлов или просто предварительный просмотр
    // you can preview these type of files if $preview_text_files is true
    //вы можете предварительно просмотреть эти типы файлов, если $ preview_text_files истинно
    'previewable_text_file_exts'              => array( "bsh", "c","css", "cc", "cpp", "cs", "csh", "pdf", "cyc", "cv", "htm", "html", "java", "js", "m", "mxml", "perl", "pl", "pm", "py", "rb", "sh", "xhtml", "xml","xsl",'txt', 'log','' ),

    // you can edit these type of files if $edit_text_files is true (only text based files)
    //вы можете редактировать эти типы файлов, если $ edit_text_files истинно (только текстовые файлы)
    // you can create these type of files if $config['create_text_files'] is true (only text based files)
    //вы можете создавать файлы этого типа, если $ config ['create_text_files'] истинно (только текстовые файлы)
    // if you want you can add html,css etc.
    //если хотите, можете добавить html, css и т. д.
    // but for security reasons it's NOT RECOMMENDED!
    //но по соображениям безопасности НЕ РЕКОМЕНДУЕТСЯ!
    'editable_text_file_exts'                 => array( 'txt', 'pdf', 'log', 'xml', 'html', 'css', 'htm', 'js','' ),

    'jplayer_exts'                            => array("mp4","pdf","flv","webmv","webma","webm","m4a","m4v","ogv","oga","mp3","midi","mid","ogg","wav"),

    'cad_exts'                                => array('dwg', 'pdf', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'svg'),

    // Preview with Google Documents
    'googledoc_enabled'                       => true,
    'googledoc_file_exts'                     => array( 'doc', 'pdf', 'docx', 'xls', 'xlsx', 'ppt', 'pptx' , 'pdf', 'odt', 'odp', 'ods'),

    // defines size limit for paste in MB / operation
    //определяет предел размера для вставки в МБ
    // set 'FALSE' for no limit
    //установите "FALSE", чтобы не было ограничений
    'copy_cut_max_size'                       => 100,
    // defines file count limit for paste / operation
    //определяет ограничение количества файлов для вставки
    // set 'FALSE' for no limit
    'copy_cut_max_count'                      => 200,
    //IF any of these limits reached, operation won't start and generate warning
    //ЕСЛИ какой-либо из этих пределов достигнут, операция не начнется и будет выдано предупреждение.

    //**********************
    //Allowed extensions (lowercase insert)
    //Допустимые расширения (вставка в нижний регистр)
    //**********************
    'ext_img'     => array( 'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'ico' ), //Images
    'ext_file'    => array( 'txt', 'doc', 'pdf', 'docx', 'rtf', 'pdf', 'xls', 'xlsx', 'txt', 'csv', 'html', 'xhtml', 'psd', 'sql', 'log', 'fla', 'xml', 'ade', 'adp', 'mdb', 'accdb', 'ppt', 'pptx', 'odt', 'ots', 'ott', 'odb', 'odg', 'otp', 'otg', 'odf', 'ods', 'odp', 'css', 'ai', 'kmz','dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'tiff',''), //Files
    'ext_video'   => array( 'mov', 'mpeg', 'm4v', 'mp4', 'avi', 'mpg', 'wma', "flv", "webm" ), //Video
    'ext_music'   => array( 'mp3', 'mpga', 'm4a', 'ac3', 'aiff', 'mid', 'ogg', 'wav' ), //Audio
    'ext_misc'    => array( 'zip', 'rar', 'gz', 'tar', 'iso', 'dmg' ), //Archives


    //*********************
    //  If you insert an extensions blacklist array the filemanager don't check any extensions but simply block the extensions in the list
    //Если вы вставляете массив черного списка расширений, файловый менеджер не проверяет какие-либо расширения, а просто блокирует расширения в списке. 
    //  otherwise check Allowed extensions configuration
    //в противном случае проверьте конфигурацию разрешенных расширений
    //*********************
    'ext_blacklist'							  => false,//['exe','bat','jpg'],


    //Empty filename permits like .htaccess, .env, ...
    //Пустое имя файла допускает такие как .htaccess, .env,
    'empty_filename'                          => false,

    /*
    |--------------------------------------------------------------------------
    | accept files without extension
    принимать файлы без расширения
    |--------------------------------------------------------------------------
    |
    | If you want to accept files without extension, remember to add '' extension on allowed extension
    Если вы хотите принимать файлы без расширения, не забудьте добавить расширение '' к разрешенному расширению
    |
    */
    'files_without_extension'	              => false,

    /******************
    * TUI Image Editor config
    *******************/
    // Add or modify the options below as needed - they will be json encoded when added to the configuration so arrays can be utilized as needed
    //Добавьте или измените приведенные ниже параметры по мере необходимости - они будут закодированы в json при добавлении в конфигурацию, поэтому массивы можно использовать по мере необходимости.
    'tui_active'                           => true,
    'tui_position'                         => 'bottom',
    // 'common.bi.image'                      => "../assets/images/logo.png",
    // 'common.bisize.width'                  => '70px',
    // 'common.bisize.height'                 => '25px',
    'common.backgroundImage'               => 'none',
    'common.backgroundColor'               => '#ececec',
    'common.border'                        => '1px solid #E6E7E8',

    // header
    'header.backgroundImage'               => 'none',
    'header.backgroundColor'               => '#ececec',
    'header.border'                        => '0px',

    // main icons
    'menu.normalIcon.path'                 => 'svg/icon-d.svg',
    'menu.normalIcon.name'                 => 'icon-d',
    'menu.activeIcon.path'                 => 'svg/icon-b.svg',
    'menu.activeIcon.name'                 => 'icon-b',
    'menu.disabledIcon.path'               => 'svg/icon-a.svg',
    'menu.disabledIcon.name'               => 'icon-a',
    'menu.hoverIcon.path'                  => 'svg/icon-c.svg',
    'menu.hoverIcon.name'                  => 'icon-c',
    'menu.iconSize.width'                  => '24px',
    'menu.iconSize.height'                 => '24px',

    // submenu primary color
    'submenu.backgroundColor'              => '#ececec',
    'submenu.partition.color'              => '#000000',

    // submenu icons
    'submenu.normalIcon.path'              => 'svg/icon-d.svg',
    'submenu.normalIcon.name'              => 'icon-d',
    'submenu.activeIcon.path'              => 'svg/icon-b.svg',
    'submenu.activeIcon.name'              => 'icon-b',
    'submenu.iconSize.width'               => '32px',
    'submenu.iconSize.height'              => '32px',

    // submenu labels
    'submenu.normalLabel.color'            => '#000',
    'submenu.normalLabel.fontWeight'       => 'normal',
    'submenu.activeLabel.color'            => '#000',
    'submenu.activeLabel.fontWeight'       => 'normal',

    // checkbox style
    'checkbox.border'                      => '1px solid #E6E7E8',
    'checkbox.backgroundColor'             => '#000',

    // rango style
    'range.pointer.color'                  => '#333',
    'range.bar.color'                      => '#ccc',
    'range.subbar.color'                   => '#606060',

    'range.disabledPointer.color'          => '#d3d3d3',
    'range.disabledBar.color'              => 'rgba(85,85,85,0.06)',
    'range.disabledSubbar.color'           => 'rgba(51,51,51,0.2)',

    'range.value.color'                    => '#000',
    'range.value.fontWeight'               => 'normal',
    'range.value.fontSize'                 => '11px',
    'range.value.border'                   => '0',
    'range.value.backgroundColor'          => '#f5f5f5',
    'range.title.color'                    => '#000',
    'range.title.fontWeight'               => 'lighter',

    // colorpicker style
    'colorpicker.button.border'            => '0px',
    'colorpicker.title.color'              => '#000',


    //The filter and sorter are managed through both javascript and php scripts because if you have a lot of
    //Фильтр и сортировщик управляются с помощ
    //file in a folder the javascript script can't sort all or filter all, so the filemanager switch to php script.
    //файл в папке скрипт javascript не может отсортировать или отфильтровать все, поэтому файловый менеджер переключается на скрипт php.
    //The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number
    //Плагин автоматически переключает javascript на php, когда текущая папка превышает указанный ниже предел количества файлов.
    'file_number_limit_js'                    => 500,

    //**********************
    // Hidden files and folders
    //**********************
    // set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)
    //установите имена любых папок, которые вы хотите скрыть (например, «hidden_folder1», «hidden_folder2»). Помните, что все папки с этими именами будут скрыты (вы можете установить любые исключения в файлах config.php для папок)
    'hidden_folders'                          => array(),
    // set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
    //становите имена любых файлов, которые вы хотите скрыть. Помните, что эти имена будут скрыты во всех папках 
    'hidden_files'                            => array( 'config.php' ),

    /*******************
    * URL upload
    *******************/
    'url_upload'                             => true,


    //************************************
    //Thumbnail for external use creation
    //Эскиз для создания внешнего использования
    //************************************


    // New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
    //Создание нового изображения с измененным размером с фиксированным путем из папки файлового менеджера после загрузки (эскизы в фиксированном режиме)
    // If you want create images resized out of upload folder for use with external script you can choose this method,
    // You can create also more than one image at a time just simply add a value in the array
    //Если вы хотите создавать изображения с измененным размером из папки загрузки для использования с внешним скриптом, вы можете выбрать этот метод,
     // Вы также можете создать более одного изображения за раз, просто добавив значение в массив
    // Remember than the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
    //Помните, что при создании изображения соблюдается иерархия папок, поэтому, если вы находитесь внутри source / test / test1 /, новое изображение будет создано в
    // path_from_filemanager/test/test1/
    // PS if there isn't write permission in your destination folder you must set it
    //если в папке назначения нет разрешения на запись, вы должны установить его
    'fixed_image_creation'                    => false, //activate or not the creation of one or more image resized with fixed path from filemanager folder
    //активировать или нет создание одного или нескольких изображений с фиксированным путем из папки файлового менеджера
    'fixed_path_from_filemanager'             => array( '../test/', '../test1/' ), //fixed path of the image folder from the current position on upload folder
    //фиксированный путь к папке изображений с текущей позиции в папке загрузки
    'fixed_image_creation_name_to_prepend'    => array( '', 'test_' ), //name to prepend on filename
    'fixed_image_creation_to_append'          => array( '_test', '' ), //name to appendon filename
    'fixed_image_creation_width'              => array( 300, 400 ), //width of image
    'fixed_image_creation_height'             => array( 200, 300 ), //height of image
    /*
    #             $option:     0 / exact = defined size;
    #                          1 / portrait = keep aspect set height;
    #                          2 / landscape = keep aspect set width;
    #                          3 / auto = auto;
    #                          4 / crop= resize and crop;
    */
    'fixed_image_creation_option'             => array( 'crop', 'auto' ), //set the type of the crop


    // New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
    //Создание нового изображения с измененным размером с относительным путем внутри папки для загрузки после загрузки (эскизы в относительном режиме)
    // With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
    // just simply add a value in the array
    //С помощью адаптивного файлового менеджера вы можете создавать изображения с автоматически изменяемым размером внутри папки загрузки, а также более одного изображения за раз.
     // просто добавляем значение в массив
    // The image creation path is always relative so if i'm inside source/test/test1 and I upload an image, the path start from here
    //Путь создания изображения всегда относительный, поэтому, если я нахожусь внутри source / test / test1 и загружаю изображение, путь начинается отсюда
    //
    'relative_image_creation'                 => false, //activate or not the creation of one or more image resized with relative path from upload folder
    //активировать или нет создание одного или нескольких изображений с измененным размером с относительным путем из папки загрузки
    'relative_path_from_current_pos'          => array( './', './' ), //relative path of the image folder from the current position on upload folder
    //относительный путь к папке изображений от текущей позиции в папке загрузки
    'relative_image_creation_name_to_prepend' => array( '', '' ), //name to prepend on filename    имя для добавления к имени файла
    'relative_image_creation_name_to_append'  => array( '_thumb', '_thumb1' ), //name to append on filename
    'relative_image_creation_width'           => array( 300, 400 ), //width of image
    'relative_image_creation_height'          => array( 200, 300 ), //height of image
    /*
     * $option:     0 / exact = defined size;
     *              1 / portrait = keep aspect set height;
     *              2 / landscape = keep aspect set width;
     *              3 / auto = auto;
     *              4 / crop= resize and crop;
     */
    'relative_image_creation_option'          => array( 'crop', 'crop' ), //set the type of the crop


    // Remember text filter after close filemanager for future session
    //Запомните текстовый фильтр после закрытия файлового менеджера для будущего сеанса
    'remember_text_filter'                    => false,

);

return array_merge(
    $config,
    array(
        'ext' => array_merge(
            $config['ext_img'],
            $config['ext_file'],
            $config['ext_misc'],
            $config['ext_video'],
            $config['ext_music']
        ),
        'tui_defaults_config' => array(
            //'common.bi.image'                   => $config['common.bi.image'],
            //'common.bisize.width'               => $config['common.bisize.width'],
            //'common.bisize.height'              => $config['common.bisize.height'], 
            'common.backgroundImage'            => $config['common.backgroundImage'],
            'common.backgroundColor'            => $config['common.backgroundColor'], 
            'common.border'                     => $config['common.border'],
            'header.backgroundImage'            => $config['header.backgroundImage'],
            'header.backgroundColor'            => $config['header.backgroundColor'],
            'header.border'                     => $config['header.border'],
            'menu.normalIcon.path'              => $config['menu.normalIcon.path'],
            'menu.normalIcon.name'              => $config['menu.normalIcon.name'],
            'menu.activeIcon.path'              => $config['menu.activeIcon.path'],
            'menu.activeIcon.name'              => $config['menu.activeIcon.name'],
            'menu.disabledIcon.path'            => $config['menu.disabledIcon.path'],
            'menu.disabledIcon.name'            => $config['menu.disabledIcon.name'],
            'menu.hoverIcon.path'               => $config['menu.hoverIcon.path'],
            'menu.hoverIcon.name'               => $config['menu.hoverIcon.name'],
            'menu.iconSize.width'               => $config['menu.iconSize.width'],
            'menu.iconSize.height'              => $config['menu.iconSize.height'],
            'submenu.backgroundColor'           => $config['submenu.backgroundColor'],
            'submenu.partition.color'           => $config['submenu.partition.color'],
            'submenu.normalIcon.path'           => $config['submenu.normalIcon.path'],
            'submenu.normalIcon.name'           => $config['submenu.normalIcon.name'],
            'submenu.activeIcon.path'           => $config['submenu.activeIcon.path'],
            'submenu.activeIcon.name'           => $config['submenu.activeIcon.name'],
            'submenu.iconSize.width'            => $config['submenu.iconSize.width'],
            'submenu.iconSize.height'           => $config['submenu.iconSize.height'],
            'submenu.normalLabel.color'         => $config['submenu.normalLabel.color'],
            'submenu.normalLabel.fontWeight'    => $config['submenu.normalLabel.fontWeight'],
            'submenu.activeLabel.color'         => $config['submenu.activeLabel.color'],
            //'submenu.activeLabel.fontWeight'    => $config['submenu.activeLabel.fontWeightcommon.bi.image'],
            'checkbox.border'                   => $config['checkbox.border'],
            'checkbox.backgroundColor'          => $config['checkbox.backgroundColor'],
            'range.pointer.color'               => $config['range.pointer.color'],
            'range.bar.color'                   => $config['range.bar.color'],
            'range.subbar.color'                => $config['range.subbar.color'],
            'range.disabledPointer.color'       => $config['range.disabledPointer.color'],
            'range.disabledBar.color'           => $config['range.disabledBar.color'],
            'range.disabledSubbar.color'        => $config['range.disabledSubbar.color'],
            'range.value.color'                 => $config['range.value.color'],
            'range.value.fontWeight'            => $config['range.value.fontWeight'],
            'range.value.fontSize'              => $config['range.value.fontSize'],
            'range.value.border'                => $config['range.value.border'],
            'range.value.backgroundColor'       => $config['range.value.backgroundColor'],
            'range.title.color'                 => $config['range.title.color'],
            'range.title.fontWeight'            => $config['range.title.fontWeight'],
            'colorpicker.button.border'         => $config['colorpicker.button.border'],
            'colorpicker.title.color'           => $config['colorpicker.title.color']
        ),
    )
);