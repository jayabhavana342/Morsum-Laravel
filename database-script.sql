create table migrations
(
  id        int unsigned auto_increment
    primary key,
  migration varchar(255) not null,
  batch     int          not null
)
  collate = utf8mb4_unicode_ci;

create table shelves
(
  created_at timestamp    null,
  updated_at timestamp    null,
  id         int unsigned auto_increment
    primary key,
  type       varchar(255) not null
)
  collate = utf8mb4_unicode_ci;

create table albums
(
  created_at timestamp    null,
  updated_at timestamp    null,
  id         int unsigned auto_increment
    primary key,
  title      varchar(255) not null,
  singer     varchar(255) not null,
  shelves_id int unsigned not null,
  constraint albums_shelves_id_foreign
  foreign key (shelves_id) references shelves (id)
)
  collate = utf8mb4_unicode_ci;

create table books
(
  created_at timestamp    null,
  updated_at timestamp    null,
  id         int unsigned auto_increment
    primary key,
  title      varchar(255) not null,
  authors    varchar(255) not null,
  shelves_id int unsigned not null,
  constraint books_shelves_id_foreign
  foreign key (shelves_id) references shelves (id)
)
  collate = utf8mb4_unicode_ci;


