import sqlite3

class DBBase:
    def __init__(self, db_name):
        # Set the database name and connect to it
        self._db_name = db_name
        self._conn = None
        self._cursor = None
        self.connect()

    def connect(self):
        # Connect to the SQLite database and create a cursor
        self._conn = sqlite3.connect(self._db_name)
        self._cursor = self._conn.cursor()

    def execute_script(self, sql_string):
        # Run a group of SQL commands (like creating tables)
        self._cursor.executescript(sql_string)
        self._conn.commit()

    @property
    def get_cursor(self):
        # Return the database cursor
        return self._cursor

    @property
    def get_connection(self):
        # Return the database connection
        return self._conn

    def reset_database(self):
        raise NotImplementedError("Must implement from the derived class")

    def close_db(self):
        # Close the database connection
        self._conn.close()
