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
    collate = utf8mb4_unicode_ci;

create table doctrine_migration_versions
(
    version        varchar(191) not null
        primary key,
    executed_at    datetime     null,
    execution_time int          null
)
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
    collate = utf8mb4_unicode_ci;

create table room
(
    id            int auto_increment
        primary key,
    title         varchar(255) not null,
    image         varchar(255) null,
    description   varchar(255) not null,
    price         double       not null,
    hostel_id     int          not null,
    supervisor_id int          null,
    countrooms    int          not null,
    constraint FK_729F519B19E9AC5F
        foreign key (supervisor_id) references supervisor (id),
    constraint FK_729F519BFC68ACC0
        foreign key (hostel_id) references hostel (id)
)
    collate = utf8mb4_unicode_ci;

create table booking
(
    id         int auto_increment
        primary key,
    booker_id  int      not null,
    room_id    int      not null,
    start_date datetime not null,
    end_date   datetime not null,
    amount     double   not null,
    constraint FK_E00CEDDE54177093
        foreign key (room_id) references room (id),
    constraint FK_E00CEDDE8B7E4006
        foreign key (booker_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_E00CEDDE54177093
    on booking (room_id);

create index IDX_E00CEDDE8B7E4006
    on booking (booker_id);

create index IDX_729F519B19E9AC5F
    on room (supervisor_id);

create index IDX_729F519BFC68ACC0
    on room (hostel_id);

create table room_user
(
    room_id int not null,
    user_id int not null,
    primary key (room_id, user_id),
    constraint FK_EE973C2D54177093
        foreign key (room_id) references room (id)
            on delete cascade,
    constraint FK_EE973C2DA76ED395
        foreign key (user_id) references user (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

create index IDX_EE973C2D54177093
    on room_user (room_id);

create index IDX_EE973C2DA76ED395
    on room_user (user_id);

create table slideimage
(
    id      int auto_increment
        primary key,
    room_id int          not null,
    url     varchar(255) not null,
    caption varchar(255) not null,
    constraint FK_AFD89A9054177093
        foreign key (room_id) references room (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_AFD89A9054177093
    on slideimage (room_id);

