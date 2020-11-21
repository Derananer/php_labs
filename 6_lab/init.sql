drop database school;
create database school;

use school;

create table teachers(
	id INT UNSIGNED PRIMARY KEY, 
	fio VARCHAR(100) NOT NULL
);

create table classes(
	id INT UNSIGNED PRIMARY KEY, 
	class_master_id INT UNSIGNED NOT NULL,
	foreign key (class_master_id) references teachers(id),
	kind_id INT UNSIGNED NOT NULL,
	students_count INT UNSIGNED NOT NULL,
	letter VARCHAR(2) NOT NULL,
	studing_year INT UNSIGNED NOT NULL,
	creating_year INT UNSIGNED NOT NULL
);

create table students(
	id INT UNSIGNED PRIMARY KEY, 
	fio VARCHAR(100) NOT NULL,
	birthday VARCHAR(40) NOT NULL,
	gender VARCHAR(20) NOT NULL,
	address VARCHAR(100) NOT NULL,
	mother_fio VARCHAR(100),
	father_fio VARCHAR(100),
	class_id INT UNSIGNED NOT NULL,
	foreign key (class_id) references classes(id),
	additional_info VARCHAR(400)
);

create table subjects(
	id INT UNSIGNED  PRIMARY KEY, 
	name VARCHAR(100) NOT NULL, 
	description VARCHAR(400), /* возраст сотрудника*/
	teacher_id INT UNSIGNED,
	foreign key (teacher_id) references teachers(id)
);



	/* заполняем таблицы данными */

	insert into teachers(id, fio) values (1, "Синичкина Ирина Владимировна"); /* на случай, когда в блюде 2 или 1 ингредиент*/
	insert into teachers(id, fio) values (2, "Белова Светлана Николаевна");
	insert into teachers(id, fio) values (3, "Бочкова Юлия Михайловна");
	insert into teachers(id, fio) values (4, "Кубышкина Лариса Георгиевна");
	insert into teachers(id, fio) values (5, "Нагиев Дмитрий Владимирович");

	insert into teachers(id, fio) values (6, "Курочкина Любовь Владимировна");
	insert into teachers(id, fio) values (7, "Говядина Виктория Александровна");
	insert into teachers(id, fio) values (8, "Лисовая Елена Александровна");
	insert into teachers(id, fio) values (9, "учитель 9");
	insert into teachers(id, fio) values (10, "учитель 10");


	insert into classes(id, class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (1, 1, 1, 0, "а", 1, 2014);
	insert into classes(id, class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (2, 2, 1, 0, "а", 2, 2013);
	insert into classes(id, class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (3, 3, 1, 0, "а", 3, 2012);
	insert into classes(id, class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (4, 4, 1, 0, "а", 4, 2011);
	insert into classes(id, class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (5, 5, 1, 0, "а", 5, 2010);

	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (1, "Гладко Лидия Семеновна", "день рождения 1", "женский", "ул. Советской-Армии", "мама", "папа", 1, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (2, "Трелкин Константин Олегович", "день рождения 1", "мужской", "ул. Стара-Загора", "мама", "папа", 2, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (3, "Иванов Иван Иванович", "день рождения 1", "мужской", "ул. Ново-Вокзальная", "мама", "папа", 3, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (4, "Соловьев Борис Александрович", "день рождения 1", "мужской", "ул. Ново-Садовая", "мама", "папа", 4, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (5, "Обувкина Галина Викторовна", "день рождения 1", "женский", "ул. Московское шоссе", "мама", "папа", 5, "additional_info");

	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (6, "Киселева Мария Михайловна", "день рождения 1", "женский", "ул. Арцыбушевская", "мама", "папа", 1, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (7, "Кубышкина Екатерина Владимировна", "день рождения 1", "женский", "ул. Льва Толстого", "мама", "папа", 2, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (8, "Лепина Татьяна Олеговна", "день рождения 1", "женский", "ул. 22 партсъезда", "мама", "папа", 3, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (9, "Лимонова Любовь Петровна", "день рождения 1", "женский", "ул. Проспект Кирова", "мама", "папа", 4, "additional_info");
	insert into students(id, fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values (10, "Быстрова Людмила Сергеевна", "день рождения 1", "женский", "ул. Ракитовское шоссе", "мама", "папа", 5, "additional_info");

	insert into subjects(id, name, description, teacher_id) values (1, "предмет 1", "description", 1 );
	insert into subjects(id, name, description, teacher_id) values (2, "предмет 2", "description", 2 );
	insert into subjects(id, name, description, teacher_id) values (3, "предмет 3", "description", 3 );
	insert into subjects(id, name, description, teacher_id) values (4, "предмет 4","description", 4 );
	insert into subjects(id, name, description, teacher_id) values (5, "предмет 5", "description", 5 );
	insert into subjects(id, name, description, teacher_id) values (6, "предмет 6","description", 6);
	insert into subjects(id, name, description, teacher_id) values (7, "предмет 7", "description", 7 );
	insert into subjects(id, name, description, teacher_id) values (8, "предмет 8", "description", 8 );
	insert into subjects(id, name, description, teacher_id) values (9, "предмет 9", "description", 9 );
	insert into subjects(id, name, description, teacher_id) values (10, "предмет 10", "description", 10 );