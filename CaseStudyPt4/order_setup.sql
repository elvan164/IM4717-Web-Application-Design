create table Orders 
(

    id int unsigned not null auto_increment primary key,
    menuid int unsigned not null references Menu(id),
    quantity int unsigned not null

);

insert into Orders values 
    (NULL,1,1),
    (NULL,2,2),
    (NULL,3,4),
    (NULL,4,6),
    (NULL,5,8);