import sqlite3

class DBbase:
    def __init__(self, db_name):
        self.db_name = db_name

    def get_connection(self):
        return sqlite3.connect(self.db_name)

    def execute_query(self, query, params=()):
        conn = self.get_connection()
        cur = conn.cursor()
        cur.execute(query, params)
        conn.commit()
        conn.close()

    def fetch_data(self, query, params=()):
        conn = self.get_connection()
        cur = conn.cursor()
        cur.execute(query, params)
        results = cur.fetchall()
        conn.close()
        return results
