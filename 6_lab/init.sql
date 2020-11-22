drop database school;
create database school;

use school;

create table teachers(
	id INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY, 
	fio VARCHAR(100) NOT NULL
);

create table classes(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	class_master_id INT UNSIGNED NOT NULL,
	foreign key (class_master_id) references teachers(id),
	kind_id INT UNSIGNED NOT NULL,
	students_count INT UNSIGNED NOT NULL,
	letter VARCHAR(2) NOT NULL,
	studing_year INT UNSIGNED NOT NULL,
	creating_year INT UNSIGNED NOT NULL
);

create table students(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
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
	id INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL, 
	description VARCHAR(400), /* возраст сотрудника*/
	teacher_id INT UNSIGNED,
	foreign key (teacher_id) references teachers(id)
);



	/* заполняем таблицы данными */

	insert into teachers(fio) values ("Синичкина Ирина Владимировна"); /* на случай, когда в блюде 2 или 1 ингредиент*/
	insert into teachers(fio) values ("Белова Светлана Николаевна");
	insert into teachers(fio) values ("Бочкова Юлия Михайловна");
	insert into teachers(fio) values ("Кубышкина Лариса Георгиевна");
	insert into teachers(fio) values ("Нагиев Дмитрий Владимирович");

	insert into teachers(fio) values ("Курочкина Любовь Владимировна");
	insert into teachers(fio) values ("Говядина Виктория Александровна");
	insert into teachers(fio) values ("Лисовая Елена Александровна");
	insert into teachers(fio) values ("Кравцова Ольга Николаевна");
	insert into teachers(fio) values ( "Лудь Юрий Константинович");


	insert into classes(class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (1, 1, 0, "а", 1, 2014);
	insert into classes(class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (2, 1, 0, "а", 2, 2013);
	insert into classes(class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (3, 1, 0, "а", 3, 2012);
	insert into classes(class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (4, 1, 0, "а", 4, 2011);
	insert into classes(class_master_id, kind_id, students_count, letter, studing_year, creating_year) values (5, 1, 0, "а", 5, 2010);

	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Гладко Лидия Семеновна", "день рождения 1", "женский", "ул. Советской-Армии", "мама", "папа", 1, "additional_info");
	update classes set students_count=students_count + 1 where id=1;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Трелкин Константин Олегович", "день рождения 1", "мужской", "ул. Стара-Загора", "мама", "папа", 2, "additional_info");
	update classes set students_count=students_count + 1 where id=2;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Иванов Иван Иванович", "день рождения 1", "мужской", "ул. Ново-Вокзальная", "мама", "папа", 3, "additional_info");
	update classes set students_count=students_count + 1 where id=3;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Соловьев Борис Александрович", "день рождения 1", "мужской", "ул. Ново-Садовая", "мама", "папа", 4, "additional_info");
	update classes set students_count=students_count + 1 where id=4;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Обувкина Галина Викторовна", "день рождения 1", "женский", "ул. Московское шоссе", "мама", "папа", 5, "additional_info");
    update classes set students_count=students_count + 1 where id=5;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Киселева Мария Михайловна", "день рождения 1", "женский", "ул. Арцыбушевская", "мама", "папа", 1, "additional_info");
	update classes set students_count=students_count + 1 where id=1;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Кубышкина Екатерина Владимировна", "день рождения 1", "женский", "ул. Льва Толстого", "мама", "папа", 2, "additional_info");
	update classes set students_count=students_count + 1 where id=2;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Лепина Татьяна Олеговна", "день рождения 1", "женский", "ул. 22 партсъезда", "мама", "папа", 3, "additional_info");
	update classes set students_count=students_count + 1 where id=3;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ("Лимонова Любовь Петровна", "день рождения 1", "женский", "ул. Проспект Кирова", "мама", "папа", 4, "additional_info");
	update classes set students_count=students_count + 1 where id=4;
	insert into students(fio, birthday, gender, address, mother_fio, father_fio, class_id, additional_info) values ( "Быстрова Людмила Сергеевна", "день рождения 1", "женский", "ул. Ракитовское шоссе", "мама", "папа", 5, "additional_info");
    update classes set students_count=students_count + 1 where id=5;

	insert into subjects(name, description, teacher_id) values ("предмет 1", "description", 1 );
	insert into subjects(name, description, teacher_id) values ("предмет 2", "description", 2 );
	insert into subjects(name, description, teacher_id) values ("предмет 3", "description", 3 );
	insert into subjects(name, description, teacher_id) values ("предмет 4","description", 4 );
	insert into subjects(name, description, teacher_id) values ("предмет 5", "description", 5 );
	insert into subjects(name, description, teacher_id) values ("предмет 6","description", 6);
	insert into subjects(name, description, teacher_id) values ("предмет 7", "description", 7 );
	insert into subjects(name, description, teacher_id) values ("предмет 8", "description", 8 );
	insert into subjects(name, description, teacher_id) values ("предмет 9", "description", 9 );
	insert into subjects(name, description, teacher_id) values ( "предмет 10", "description", 10 );