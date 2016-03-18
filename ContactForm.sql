create table ContactForm (
  name varchar(100) NOT NULL,
  email varchar(100),
  phone varchar(50),
  message varchar(500),
  received timestamp(4) NOT NULL,
  PRIMARY KEY (name, received)
);
