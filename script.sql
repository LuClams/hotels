create table contact
(
    id      int auto_increment
        primary key,
    object  varchar(255) not null,
    name    varchar(255) not null,
    email   varchar(255) not null,
    message longtext     not null,
    sent_at datetime     not null
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table doctrine_migration_versions
(
    version        varchar(191) not null
        primary key,
    executed_at    datetime     null,
    execution_time int          null
)
    engine = InnoDB
    collate = utf8_unicode_ci;

create table hostel
(
    id          int auto_increment
        primary key,
    name        varchar(255) not null,
    city        varchar(255) not null,
    address     varchar(255) not null,
    description longtext     not null
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table user
(
    id          int auto_increment
        primary key,
    email       varchar(180) not null,
    roles       longtext     not null comment '(DC2Type:json)',
    password    varchar(255) not null,
    firstname   varchar(255) null,
    lastname    varchar(255) null,
    is_verified tinyint(1)   not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table supervisor
(
    id        int auto_increment
        primary key,
    user_id   int not null,
    hostel_id int not null,
    constraint UNIQ_4D9192F8A76ED395
        unique (user_id),
    constraint UNIQ_4D9192F8FC68ACC0
        unique (hostel_id),
    constraint FK_4D9192F8A76ED395
        foreign key (user_id) references user (id),
    constraint FK_4D9192F8FC68ACC0
        foreign key (hostel_id) references hostel (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table room
(
    id            int auto_increment
        primary key,
    title         varchar(255) not null,
    image         varchar(255) null,
    description   varchar(255) not null,
    price         int          not null,
    hostel_id     int          not null,
    supervisor_id int          null,
    constraint FK_729F519B19E9AC5F
        foreign key (supervisor_id) references supervisor (id),
    constraint FK_729F519BFC68ACC0
        foreign key (hostel_id) references hostel (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create table booking
(
    id         int auto_increment
        primary key,
    booker_id  int      not null,
    start_date datetime not null,
    end_date   datetime not null,
    amount     int      not null,
    room_id    int      not null,
    constraint UNIQ_E00CEDDE8B7E4006
        unique (booker_id),
    constraint FK_E00CEDDE54177093
        foreign key (room_id) references room (id),
    constraint FK_E00CEDDE8B7E4006
        foreign key (booker_id) references user (id)
)
    engine = InnoDB
    collate = utf8mb4_unicode_ci;

create index IDX_E00CEDDE54177093
    on booking (room_id);

create index IDX_729F519B19E9AC5F
    on room (supervisor_id);

create index IDX_729F519BFC68ACC0
    on room (hostel_id);


