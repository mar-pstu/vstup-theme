<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	update_option( "theme_mods_$theme_slug", array_merge( [

	 	// блоки темы - шапка
	 	'header_blog_name'  => 'Міністерство освіти і науки України Державний вищий навчальний заклад «Приазовський державний технічний університет» ДВНЗ «ПДТУ»',

		// Главная страница - Первый экран
		'firstscreen_flag'  => true,
		'firstscreen_number' => 5,
		'firstscreen_bg_title' => 'ПДТУ',
		'firstscreen'       => [
			[
				'title'       => 'Вашою метою є отримання вищої освіти європейського рівня?',
				'bgi'         => '',
				'excerpt'     => 'Приазовський державний технічний університет входить в європейську зону вищої освіти, яка забезпечує мобільність працевлаштування. Наша система освіти сумісна з європейськими.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Ви мрієте внести свій вклад в науку?',
				'bgi'         => '',
				'excerpt'     => 'Наукова діяльність студентів Приазовського державного технічного університету забезпечує їх високу кваліфікацію як фахівців. Вони застосовують у практичній діяльності новітні досягнення науки.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Ви є іноземець і обираєте собі країну та університет для навчання?',
				'bgi'         => '',
				'excerpt'     => 'Іноземні студенти Приазовського державного технічного університету отримують мовну підготовку та адаптацію, гідний рівень освіти всіх рівнів, і в перспективі вид на проживання в Україні.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Хочете оволодіти іноземною мовою, отримати міжнародні сертифікати та відмінну оцінку на тестуванні?',
				'bgi'         => '',
				'excerpt'     => 'Міжнародний освітньо-кваліфікаційний центр Приазовського державного технічного університету успішно здійснює підготовку студентів до складання міжнародних іспитів з іноземної мови.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Ви хочете вчитися і займатися спортом, мати цікаве дозвілля?',
				'bgi'         => '',
				'excerpt'     => 'Студентські роки проведені в стінах Приазовського державного технічного університету - окреме маленьке життя, наповнена найкрутішими подіями, творенням і енергією.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Ви хочете отримати військову професію і захищати Україну?',
				'bgi'         => '',
				'excerpt'     => 'Пройдіть навчання на військовій кафедрі Приазовського державного технічного університету і отримаєте військову спеціальність паралельно з навчанням або службою.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
			[
				'title'       => 'Ви прагнете брати участь в міжнародних проектах?',
				'bgi'         => '',
				'excerpt'     => 'Студенти Приазовського державного технічного університету є активними учасниками програми транс\'європейського співробітництва, вони займаються розробкою інноваційних пропозицій для європейських партнерів.',
				'permalink'   => '',
				'label'       => 'Докладніше',
			],
		],

		// Главная странциа - О нас
		'about_flag'        => true,
		'about_page_id'     => '640',
		'about_title'       => 'Приазовський державний технічний університет',
		'about_description' => 'ДВНЗ «Приазовський державний технічний університет», творений  1930 році, є найбільшим закладом вищої освіти Приазов\'я. Університет тестовано за найвищим – IV рівнем акредитації України. Він проводить освітню діяльність за європейськими стандартами за всіма напрямами. Підтверджено право ДВНЗ «ПДТУ» вести підготовку за освітньо-професійним ступінем фаховий молодший бакалавр, ступенями вищої освіти бакалавр, магістр, доктор філософії, доктор наук. Університет має потужну сучасну науково-технічну базу, зокрема кампусну IT - інфраструктуру, Спільно з металургійними комбінатами та іншими підприємствами регіону створено Навчальні комплекси «Школа-університет-підприємство»',
		'about_label'       => 'Подробней',
		'about_thumbnail'   => 'https://pstu.edu/wp-content/uploads/2019/06/%D0%9F%D0%93%D0%A2%D0%A3-%D0%BB%D0%BE%D0%B3%D0%BE.png',

		// Главная страница - Носости
		'news_flag'       => true,
		'news_terms_number' => 2,
		'news_categories' => [ '2546', '2566' ],
		'news_numberposts' => 5,
		'news_label'      => 'Всі новини',
		'news_permalink'  => 'https://pstu.edu/uk/category/pres-czentr/',
		'news_title'      => 'Новини',
		'news_numberentries' => 6,
		'news_entries'    => [],

		// главная странциа - Начни с нами
		'action_flag'     => true,
		'action_page_id'  => '2330',
		'action_title'    => 'Почни з нами',
		'action_excerpt'  => '',
		'action_page_id'  => 434,
		'action_label'    => 'Вступ 2020',
		'action_bgi'      => get_theme_file_uri( 'images/action/bg.jpg' ),
		'action_bgc'      => '#76bcf8',
		'action_thumbnail' => 'https://pstu.edu/wp-content/uploads/2019/06/%D0%9F%D0%93%D0%A2%D0%A3-%D0%BB%D0%BE%D0%B3%D0%BE-150x150.png',
		'action_video'    => 'https://youtu.be/IUXXfvIUIKg',

		// главная странциа - специальности
		'faculties_flag' => true,
		'faculties_title' => 'Факультети',
		'faculties_excerpt' => '',
		'faculties_label' => 'Всі підрозділи',
		'faculties_permalink' => 'https://pstu.edu/uk/university/structure/',
		'faculties_numberposts' => 10,
		'faculties'       => [
			[
				'name'      => 'Економічний факультет',
				'excerpt'   => 'Економіка підприємства, Економіка довкілля і природних ресурсів, Економіка підприємства, Облік і аудит, Фінанси і кредит, Менеджмент, Бізнес-адміністрування, Менеджмент організацій і адміністрування (Магістр), Управління проектами, Бізнес-адміністрування, Маркетинг, IT маркетинг, Підприємництво, торгівля та біржова діяльність, Інтелектуальна власність, Якість, стандартизація та сертифікація',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/ekonomichnyj-fakultet/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/EkF-300x300.png',
			],
			[
				'name'      => 'Енергетичний факультет',
				'excerpt'   => 'Електроенергетика, електротехніка та електромеханіка, Електротехнічні системи електроспоживання, Системи управління виробництвом і розподілом електроенергії, Електромеханічні системи автоматизації та електропривод, Теплоенергетика',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/energetychnyj-fakultet/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/EnF-300x300.png',
			],
			[
				'name'      => 'Військової підготовка',
				'excerpt'   => 'Бойове застосування механізованих з’єднань, військових частин і підрозділів, Бойове застосування безпілотних авіаційних комплексів тактичних класів, Організація перевезень і управління на автомобільному транспорті, Психологія',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/kafedra-vijskovoyi-pidgotovky/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2018/09/%D0%92%D0%A1%D0%A3.png',
			],
			[
				'name'      => 'Металургійний факультет',
				'excerpt'   => 'Матеріалознавство, Матеріалознавство, Комп’ютерний дизайн, 3D-технології та експертиза матеріалів, Металургія, Металургія чорних металів, Обробка металів тиском',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/metalurgijnyj-fakultet/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/MF-ru-300x300.png',
			],
			[
				'name'      => 'Соціально-гуманітарний факультет',
				'excerpt'   => 'Філологія (переклад з російської, польської мов на українську), Переклад (російська та польська мови), Англійська та німецька мови (переклад включно), Переклад (англійська та німецька мови),Соціальна робота',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/soczialno-gumanitarnyj-fakultet/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/SGF-300x300.png',
			],
			[
				'name'      => 'Факультет інженерної та мовної підготовки',
				'excerpt'   => 'На факультеті працюють досвідчені викладачі, які мають великий стаж роботи з іноземними студентами. Більшість із них є авторами посібників, схвалених і рекомендованих Міністерством освіти і науки України для мовної підготовки іноземних студентів. Факультет має сучасну матеріально-технічну базу, власний аудиторний фонд, відповідне методичне забезпечення.',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/1038-2/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/FIMP-300x300.png',
			],
			[
				'name'      => 'Факультет інформаційних технологій',
				'excerpt'   => 'Середня освіта освітня програма «Математика», Комп’ютерне моделювання, Комп’ютерне моделювання, Інформатика, Консолідована інформація, Комп’ютерні науки, Інформаційні системи та технології, Автоматизація та комп’ютерно-інтегровані технології, Автоматизоване управління технологічними процесами, Комп’ютерно-інтегровані технологічні процеси і виробництва, Біомедична інженерія',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/fakultet-informaczijnyh-tehnologij/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/FIT-300x300.png',
			],
			[
				'name'      => 'Факультет машинобудування та зварювання',
				'excerpt'   => 'Зварювання, Технології та устаткування зварювання, Відновлення та підвищення зносостійкості деталей і конструкцій, Інженерна механіка, Прикладна механіка',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/mehaniko-mashynobudivnyj-fakultet/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/FMZ-300x300.png',
			],
			[
				'name'      => 'Факультет транспортних технологій',
				'excerpt'   => 'Менеджмент транспорту та логістики, Логістичний менеджмент, Транспортні системи, Транспортні технології на залізничному транспорті, Організація перевезень і управління на промисловому транспорті, Транспортні технології на автомобільному транспорті, Організація перевезень і управління на автомобільному транспорті, Організація міжнародних перевезень, Інжиніринг криз та ризиків у сфері транспортних послуг',
				'permalink' => 'https://pstu.edu/uk/fakultety-2/fakultet-transportnyh-tehnologij/',
				'logo'      => 'https://pstu.edu/wp-content/uploads/2017/05/FTT-300x300.png',
			],
			[
				'name'      => 'Центр заочного навчання',
				'excerpt'   => 'Структурний підрозділ ДВНЗ «Приазовський державний технічний університет», що за заочною формою навчання готує бакалаврів та магістрів',
				'permalink' => 'https://pstu.edu/uk/university/structure/departments/czentr-zaochnogo-navchannya/',
				'logo'      => '',
			],
		],

		// главная страница - блок видео
		'videos_flag'     => true,
		'videos'          => [
			[
				'label'         => 'Спеціальність Переклад',
				'permalink'     => 'https://youtu.be/HzrH6gbxR8M',
				'thumbnail'     => '',
			],
			[
				'label'         => 'Соціально-гуманітарний факультет',
				'permalink'     => 'https://youtu.be/Z9eQAszhC2I',
				'thumbnail'     => '',
			],
			[
				'label'         => 'Крок у нове життя',
				'permalink'     => 'https://youtu.be/3BEmHgUUHEg',
				'thumbnail'     => '',
			]
		],

		// главная странциа - выпускники
		'people_flag'     => true,
		'people_page_id'  => '',
		'people_title'    => 'Випускники',
		'people_description' => '',
		'people_label'    => 'Докладніше',
		'people_permalink' => '',
		


		// главная страница - услуги
		'services_flag'   => true,
		'services_ct'     => 'services',
		'services_page_id' => '',
		'services_title'  => 'Послуги',
		'services_label'  => 'Докладніше',

		// главная страница - Задать вопрос
		'questions_flag'  => true,
		'questions_title' => 'Залишилися питання? Дзвони або пиши нам!',
		'question_permalink' => '',
		'question_label'  => 'Відповіді на типові питання',
		'questions_form'  => '',
		'questions_bgi'   => VSTUP_URL . '/images/questions/bg.jpg',


		// преимущества
		'advantages_number' => 3,
		'advantages'      => [
			[
				'value'     => '80',
				'label'     => 'спеціальностей',
				'link'      => '#',
				'image'     => '',
			],
			[
				'value'     => '20',
				'label'     => 'європейських проектів',
				'link'      => '#',
				'image'     => '',
			],
			[
				'value'     => '90',
				'label'     => 'років історії',
				'link'      => '#',
				'image'     => '',
			],
		],

		// главная страница - партнёры
		'partners_flag'   => true,
		'partners_number' => 5,
		'partners'        => [
			'https://pstu.edu/wp-content/uploads/2018/09/МОН.png',
			'https://pstu.edu/wp-content/uploads/2019/06/ДТЭК-логотип.png',
			'https://pstu.edu/wp-content/uploads/2019/06/Метинвест-логотип.jpg',
			'https://pstu.edu/wp-content/uploads/2018/11/ПИТ.png',
		],

		// выпускники
		'graduates_number' => 5,
		'graduates'       => [
			[
				'name'      => 'Бойченко Вадим Сергійович',
				'foto'      => 0,
				'excerpt'   => 'Eкраїнський політик, Маріупольський міський голова. Закінчив ПДТУ у 2001.',
				'specialty_title' => 'Факультет транспортних технологій',
				'specialty_permalink' => 'https://pstu.edu/uk/fakultety-2/fakultet-transportnyh-tehnologij/',
				'specialty_thumbnail' => 0,
			],
			[
				'name'      => '',
				'foto'      => 0,
				'excerpt'   => '',
				'specialty_title' => '',
				'specialty_permalink' => '',
				'specialty_thumbnail' => 0,
			],
			[
				'name'      => 'Сергій Олексійович Тарута',
				'foto'      => 0,
				'excerpt'   => 'Український підприємець, політик, голова ради директорів компанії «Індустріальний союз Донбасу»',
				'specialty_title' => 'Механіко-металургійний факультет',
				'specialty_permalink' => 'https://pstu.edu/uk/fakultety-2/mehaniko-mashynobudivnyj-fakultet/',
				'specialty_thumbnail' => 0,
			],
			[
				'name'      => '',
				'foto'      => 0,
				'excerpt'   => '',
				'specialty_title' => '',
				'specialty_permalink' => '',
				'specialty_thumbnail' => 0,
			],
			[
				'name'      => '',
				'foto'      => 0,
				'excerpt'   => '',
				'specialty_title' => '',
				'specialty_permalink' => '',
				'specialty_thumbnail' => 0,
			],
		],

		// писок услуг
		'services_items_number' => 6,
		'services_items'  => [
			[
				'title'     => 'Донбас-Україна',
				'thumbnail' => '',
				'permalink' => 'https://pstu.edu/uk/university/structure/departments/osvitnij-czentr-donbas-ukrayina/',
			],
			[
				'title'     => 'навчання для іноземців',
				'thumbnail' => '',
				'permalink' => 'https://studyinukraine.pstu.edu',
			],
			[
				'title'     => 'Практика школярів',
				'thumbnail' => '',
				'permalink' => 'https://pstu.edu/uk/vstup/proforiyentaczijna-praktyka/',
			],
			[
				'title'     => 'Центр кар\'єри',
				'thumbnail' => '',
				'permalink' => 'https://pstu.edu/uk/university/structure/departments/czentr-karyery/',
			],
			[
				'title'     => 'Курси',
				'thumbnail' => '',
				'permalink' => 'https://eng.pstu.edu',
			],
		],

		// контакты университета
		'contacts'        => [
			'phone'         => '',
			'email'         => '',
		],

		// социальные сети
		'socials'         => [
			'facebook'      => 'https://www.facebook.com/mar.pstu',
			'twitter'       => 'https://twitter.com/mar_pstu',
			'instagram'     => 'https://www.instagram.com/mar.pstu/',
			'youtube'       => 'https://www.youtube.com/channel/UC_vS5rv2BJan5WF-hC55mUQ',
		],

	], $mods ) );
}

add_action( 'after_switch_theme', 'vstup\setup_default_mods' );