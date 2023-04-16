-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.20.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `title`, `image_path`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1,	'Встановлення та налаштування ПЗ',	'/uploads/category/16805357871680114760configuration-iconsvgsvg.svg',	'Встановлення та налаштування ПЗ',	NULL,	NULL,	'2023-03-28 13:22:09',	'2023-04-11 15:30:16'),
(2,	'Загальне користування Ubuntu',	'/uploads/category/16805358181679831580ubuntu-logo-2022svgsvg.svg',	'Загальне користування Ubuntu',	NULL,	NULL,	'2023-04-03 12:30:18',	'2023-04-11 15:32:17');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(9,	'2023_03_27_180847_create_categories_table',	2),
(16,	'2023_04_03_155659_create_posts_table',	3),
(17,	'2023_04_08_090114_alter_posts_table',	4),
(18,	'2023_03_24_075403_create_pages_table',	5);

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_route_name_unique` (`route_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `route_name`, `title`, `body`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1,	'homepage',	'Категорії бази знань Ubuntu',	NULL,	'Категорії бази знань Ubuntu',	NULL,	NULL,	NULL,	NULL),
(2,	'about',	'Про базу знань Ubuntu',	NULL,	'Про базу знань Ubuntu',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_of_category` (`category_id`),
  CONSTRAINT `id_of_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `category_id`, `title`, `description`, `text`, `image_path`, `image_title`, `image_alt`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1,	1,	'Встановлення вебсервера Apache в Ubuntu 20.04',	'В даній статті надається опис мінімальної кількості кроків необхідних для встановлення вебсервера Apache в Ubuntu 20.04.',	'<strong class=\"contents\">Зміст:</strong>\r\n<ul>\r\n<li><a href=\"#step1\" title=\"Розділ з першим кроком\">Крок 1 - Встановлення Apache</a></li>\r\n<li><a href=\"#step2\" title=\"Розділ з другим кроком\">Крок 2 - Перевірка</a></li>\r\n<li><a href=\"#step3\" title=\"Розділ з примітками\">Примітки</a></li>\r\n</ul>\r\n\r\n<h2 class=\"h2\" id=\"step1\">Крок 1 - Встановлення Apache</h2>\r\n<p>Введіть в термінал наступну команду:</p>\r\n\r\n<ol class=\"console\">\r\n<li><code>sudo apt install apache2</code></li>\r\n</ol>\r\n\r\n\r\n<p>Використані в команді утиліти:</p>\r\n<ul>\r\n<li>sudo - програма для виконання адміністративних операцій з <a href=\"/posts/3\" target=\"_blank\" title=\"Стаття про «root» користувача\">«root»</a> привілегіями;</li>\r\n<li>apt (advanced packaging tool) - програма для встановлення, оновлення і вилучення програмних пакунків;</li>\r\n</ul>\r\n\r\n<h2 class=\"h2\" id=\"step2\">Крок 2 - Перевірка</h2>\r\n<p>Введіть в термінал наступну команду:</p>\r\n\r\n<ol class=\"console\">\r\n<li><code>sudo systemctl status apache2</code></li>\r\n</ol>\r\n\r\n<p>Приклад результату:</p>\r\n<div  class=\"console\">\r\n<pre><code>● apache2.service - The Apache HTTP Server\r\n     Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor preset: enabled)\r\n     Active: <strong style=\"color:#80e001;\">active (running)</strong> since Thu 2023-04-06 18:16:37 EEST; 4h 10min ago\r\n       Docs: https://httpd.apache.org/docs/2.4/\r\n    Process: 938 ExecStart=/usr/sbin/apachectl start (code=exited, status=0/SUCCESS)\r\n   Main PID: 1067 (apache2)\r\n      Tasks: 4 (limit: 18928)\r\n     Memory: 39.9M\r\n     CGroup: /system.slice/apache2.service\r\n             ├─1067 /usr/sbin/apache2 -k start\r\n             ├─1069 /usr/sbin/apache2 -k start\r\n             ├─1086 /usr/sbin/apache2 -k start\r\n             └─21548 /usr/sbin/apache2 -k start\r\n</code></pre>\r\n</div>\r\n\r\n<h2 class=\"h2\" id=\"step3\">Примітки</h2>\r\n<p>У випадку коли щось пішло не так, в прогді стане вміння користуватись логуванням.</p>',	'/uploads/post/168080063016806064771679420896screenshot-from-2023-03-21-19-47-44pngpngpng.png',	'Логотип Apache HTTP server project',	'Зображення логотипу Apache HTTP server project',	'Встановлення вебсервера Apache в Ubuntu 20.04',	NULL,	NULL,	'2023-04-06 14:03:50',	'2023-04-16 09:52:00'),
(2,	2,	'Командний рядок для початківців Ubuntu 20.04',	'Дана стаття надає визначення командному рядку, описує процес його використання та містить таблицю з переліком поєднань клавіш які можуть бути використані при роботі з терміналом.',	'<strong class=\"contents\">Зміст:</strong>\r\n<ul>\r\n<li><a href=\"#section1\" title=\"Розділ з визначенням\">Визначення</a></li>\r\n<li><a href=\"#section2\" title=\"Розділ в якому пояснюється як відкрити термінал\">Як відкрити термінал?</a></li>\r\n<li><a href=\"#section3\" title=\"Розділ з прикладом команди\">Приклад команди</a></li>\r\n<li>\r\n<a href=\"#section4\" title=\"Розділ з описом поняття робочого каталогу\">Поняття робочого каталогу</a>\r\n<ul>\r\n<li><a href=\"#section4_1\" title=\"Розділ що відповідає на запитання «Як змінити робочий каталог?»\">Як змінити робочий каталог?</a></li>\r\n</ul>\r\n</li>\r\n<li><a href=\"#section5\" title=\"Розділ з переліком комбінацій клавіш які використовуються при роботі з терміналом\">Гарячі клавіші які використовуються при роботі з терміналом</a></li>\r\n</ul>\r\n\r\n<h2 class=\"h2\" id=\"section1\">Визначення</h2>\r\n<p>Командний рядок Linux — це текстовий інтерфейс для вашого комп’ютера.</p>\r\n\r\n<p>Його також назвивають:</p>\r\n<ul>\r\n<li>термінал</li>\r\n<li>командна оболонка</li>\r\n<li>… інші варіанти типу “віконце для команд”…</li>\r\n</ul>\r\n\r\n<h2 class=\"h2\" id=\"section2\">Як відкрити термінал?</h2>\r\n<p>В Ubuntu 20.04 ви можете знайти ярлик для запуску термінала виконавши наступне:\r\n<ol>\r\n<li>клацніть на «Activities» у верхньому лівому куті екрана</li>\r\n<li>введіть кілька перших літер одного зі слів: “terminal”, “command”, “prompt” або “shell”. </li>\r\n</ol>\r\n<p>Так, розробники налаштували можливість пошуку з використанням найпоширеніших англомовних синонімів, що, в свою чергу, спрощує процес знаходження ярлика.</p>\r\n<img src=\"/uploads/images/Screenshot_from_2023-04-07_20-51-59-min.jpg\" alt=\"Скріншот зі знайденим ярликом для запуску термінала\" title=\"Так виглядає результат пошуку ярлика для запуку термінала\">\r\n<p>Якщо вам не вдається знайти ярлик, або ви просто хочете швидше відкрити термінал, то можете спробувати натиснути <kbd>Ctrl</kbd>+<kbd>Alt</kbd>+<kbd>T</kbd>, що в більшості систем Linux за замовчуванням запускає термінал.</p>\r\n\r\n<p>Яким способом ви би не запустили термінал, у вас повинно вийти досить пусте вікно з дивним фрагментом тексту вгорі (в моєму випадку зеленого кольору). <br>Залежно від вашої системи Linux кольори і текст можуть відрізнятись, але загальний макет вікна з великою (переважно порожньою) областю для тексту має бути схожим на зображення нижче.</p>\r\n\r\n<img src=\"/uploads/images/Screenshot_from_2023-04-08_17-00-27-min.jpg\" alt=\"Скріншот вікна термінала\" title=\"Так виглядає вікно термінала\">\r\n\r\n<p>Дивний фрагмент тексту є свого роду підказкою про те, що термінал готовий до введення команди. Він також використовується для позначення в текстовому полі попередньо введених команд.<br>Команди вводяться поряд з цим фрагментом тексту. </p>\r\n\r\n<h2 class=\"h2\" id=\"section3\">Приклад команди</h2>\r\n<p>Давайте запустимо нашу першу команду. Клацніть мишкою у вікні, щоб переконатися, що саме туди буде здійснюватись ввід, а потім введіть наступну команду та натисніть <kbd>Enter</kbd> або <kbd>Return</kbd>.</p>\r\n\r\n<ol class=\"console\">\r\n<li><code>pwd</code></li>\r\n</ol>\r\n\r\n<p>У відповідь термінал повинен вивести шлях до каталогу (ймовірно, щось на зразок /home/YOUR_USERNAME), а потім іншу копію вищеописаного фрагмента тексту-підказки (вказуючи на готовність до введення нової команди).</p>\r\n<img src=\"/uploads/images/Screenshot_from_2023-04-08_20-04-30-min.jpg\" alt=\"Скріншот вікна термінала зі введеною командою pwd та результатом виконання цієї команди\" title=\"Так виглядає вікно термінала зі введеною командою pwd та результатом виконання цієї команди\">\r\n\r\n<div class=\"note-caution\">\r\n<div>\r\n<strong>Важливість регістру</strong>\r\n<p>Будьте особливо обережні з регістром під час введення команд. Введення <code>PWD</code> замість <code>pwd</code> призведе до помилки, але бувають випадки коли неправильний регістр може призвести до того, що буде виконана інша команда.</p>\r\n</div>\r\n</div>\r\n\r\n<h2 class=\"h2\" id=\"section4\">Поняття робочого каталогу</h2>\r\n<p>Наведена в прикладі команда <code class=\"console\">pwd</code> є скороченням від ‘<b>p</b>rint <b>w</b>orking <b>d</b>irectory’ (надрукувати робочий каталог). Все, що вона робить, це роздруковує поточний робочий каталог командного рядка. Але що таке <i>робочий каталог</i>?</p>\r\n\r\n<p>Командний рядок має адресу для запуску команд (також відому як місцезнаходження), яка визначає каталог (папку) у якому відбуватимуться операції з файлами. Це і є його робочий каталог. Створення нових файлів або каталогів, перегляд списку інсуючих, видалення, та інші подібні операції за замовчуванням здійснюються в поточному робочому каталозі. <br>Дуже важливо мати уявлення про те, яка адреса каталогу в якому ви знаходитесь, адже видалення файлів з неправильного каталогу може бути катастрофічним.</p>\r\n\r\n<h3 class=\"h3\" id=\"section4_1\">Як змінити робочий каталог?</h3>\r\n<p>Ви можете змінити робочий каталог (інакше кажучи - змінити місцезнаходження, або перейти в інший каталог) за допомогою команди <code class=\"console\">cd</code>, абревіатури від \'<b>c</b>hange <b>d</b>irectory\' (змінити каталог). Спробуйте ввести наступне:</p>\r\n\r\n<ol class=\"console\">\r\n<li><code>cd /</code></li>\r\n<li><code>pwd</code></li>\r\n</ol>\r\n\r\n<div class=\"note-info\">\r\n<p><strong>Примітка:</strong> Зауважте, що роздільником каталогу є скісна риска (”/”), а не зворотна скісна риска, до якої ви можливо вже звикли в системах Windows або DOS.</p>\r\n</div>\r\n\r\n<p>Тепер ваш робочий каталог – ”/”. Цей каталог називають <code>root</code>, тобто англійською - кореневий (не плутати з <a href=\"/posts/3\" target=\"_blank\" title=\"Стаття про «root» користувача\">«root» користувачем</a>). З нього починається шлях до будь-якого файлу на комп\'ютері. </p>\r\n\r\n<div class=\"note-info\">\r\n<p><strong>Примітка:</strong> Якщо ви працювали з ОС Windows, ви, ймовірно, звикли до того, що файлова система поділяється на «диски» які позначаються буквами, а основний «системний диск» зазвичай має назву «C:». Unix-подібні системи не мають такого поділу. Натомість вони використовують єдину уніфіковану файлову систему, а окремі «диски» можна приєднати («монтувати») до будь-якого місця у цій файловій системі. <br>Каталог ”/”, який часто називають кореневим каталогом, являє собою основу їх файлової системи. З нього вона розгалужується, утворюючи дерево з каталогів і підкаталогів.</p>\r\n</div>\r\n\r\n<p>Наступна команда запущена в кореневому каталозі перемістить вас у ”<code>home</code>” каталог (який є безпосереднім підкаталогом кореневого ”/”):</p>\r\n<ol class=\"console\">\r\n<li><code>cd home</code></li>\r\n<li><code>pwd</code></li>\r\n</ol>\r\n\r\n<p>Щоб перейти до батьківського каталогу (в даному випадку назад до ”/”, використовуйте дві крапки <code class=\"console\">cd ..</code> (зверніть увагу на пробіл між ”<code>cd</code>” і ”<code>..</code>”, на відміну від DOS, ви <b>не можете</b> просто ввести <code class=\"console\">cd..</code> без пробіла):</p>\r\n<ol class=\"console\">\r\n<li><code>cd ..</code></li>\r\n<li><code>pwd</code></li>\r\n</ol>\r\n\r\n<p>Команда <code class=\"console\">cd</code> сама по собі (без додатковго тексту) це швидкий спосіб повернутись до вашого користувацького домашнього каталогу:</p>\r\n<ol class=\"console\">\r\n<li><code>cd</code></li>\r\n<li><code>pwd</code></li>\r\n</ol>\r\n\r\n<h2 class=\"h2\" id=\"section5\">Гарячі клавіші які використовуються при роботі з терміналом</h2>\r\n\r\n<table class=\"bordered\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tbody>\r\n<tr>\r\n<th class=\"text_left\">Комбінація</th>\r\n<th class=\"text_left\">Що робить</th>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>T</kbd></td>\r\n<td>Відкриває нову вкладку в активному вікні терміналу</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>W</kbd></td>\r\n<td>Закриває активну вкладку</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>A</kbd></td>\r\n<td>Переміщає курсор на початок рядка</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>E</kbd></td>\r\n<td>Переміщає курсор у кінець рядка</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>U</kbd></td>\r\n<td>Видаляє весь поточний рядок</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>K</kbd></td>\r\n<td>Видаляє з поточного рядка частину що знаходиться після курсора</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>W</kbd></td>\r\n<td>Видаляє одне слово перед курсором</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>R</kbd></td>\r\n<td>Надає поле вводу для пошуку команди в історії</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>C</kbd></td>\r\n<td>Вбиває поточний процес</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>Z</kbd></td>\r\n<td>Призупиняє поточний процес, відправляючи сигнал SIGSTOP</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>L</kbd></td>\r\n<td>Очищає вікно термінала</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Alt</kbd> + <kbd>F</kbd></td>\r\n<td>Переміщає курсор на одне слово вперед</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Alt</kbd> + <kbd>B</kbd></td>\r\n<td>Переміщає курсор на одне слово назад</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>C</kbd></td>\r\n<td>Копіює виділений текст в буфер обміну</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Ctrl</kbd> + <kbd>Shift</kbd> + <kbd>V</kbd> або <kbd>Shift</kbd> + <kbd>Insert</kbd></td>\r\n<td>Вставляє текст з буфера обміну</td>\r\n</tr>\r\n<tr>\r\n<td>Стрілочки вгору/вниз</td>\r\n<td>Прокручують історію команд</td>\r\n</tr>\r\n<tr>\r\n<td><kbd>Tab</kbd></td>\r\n<td>Автоматично дописує команду яку ви вводите. Якщо є більше одного варіанту дописування, ви можете натиснути <kbd>Tab</kbd> кілька разів, щоб їх побачити</td>\r\n</tr>\r\n</tbody>\r\n</table>',	'/uploads/post/16808815331679843325gnome-terminal-icon-2019svg-1svg.svg',	'Піктограма терміналу в Ubuntu',	'Піктограма терміналу в Ubuntu',	'Командний рядок для початківців Ubuntu 20.04',	NULL,	NULL,	'2023-04-07 12:32:13',	'2023-04-16 15:03:45'),
(3,	2,	'Суперкористувач «root»',	'У статті надається визначення для поняття «root» в UNIX-подібних системах, а також описуються основні відомості про root користувача в Ubuntu',	'<p>Суперкористувач (адміністратор) «root» - спеціальний аккаунт в UNIX-подібних системах, використання якого надає максимальну кількість прав на здійснення операцій.</p>\r\n\r\n<div class=\"note-info\">\r\n<p><strong>Примітка:</strong> Логін «root» для цього аккаунту використовується за замовчуванням. При необхідності його можливо змінити.</p>\r\n</div>\r\n\r\n<h2 class=\"h2\">Призначення «root» прав</h2>\r\n<p>Права звичайного користувача в Linux достатньо обмежені. </p>\r\n\r\nhttps://timeweb.com/ru/community/articles/root-v-linux\r\nhttps://ubuntu.com/server/docs/security-users',	'/uploads/post/1680941612asdwdqdwpng.png',	'Слово #root',	'Зображення зі словом #root',	'Суперкористувач «root»',	NULL,	NULL,	'2023-04-08 05:13:32',	'2023-04-08 14:36:58');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin@mail.com',	NULL,	'$2y$10$Lxnbc.03nYMtvLWSx0B2.u8lw8BzpCxpYOAII8WewOLz2t3Iy2zWy',	NULL,	'2023-03-28 12:31:52',	'2023-03-28 12:31:52');

-- 2023-04-16 18:40:42
