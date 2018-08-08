CREATE DATABASE IF NOT EXISTS expense_db;

USE expense_db;

CREATE TABLE IF NOT EXISTS expense_table (
	expense_date DATE, 
	expense_category VARCHAR(30), 
	expense_type varchar(10), 
	expense_amount int(10) 
);
