from db_base import DBBase  # Import the database class

class QuizDB(DBBase):
    def __init__(self, db_name="quiz.db"):
        # Start the database
        super().__init__(db_name)

    def reset_database(self):
        # Delete existing tables
        sql_script = """
        DROP TABLE IF EXISTS questions;
        DROP TABLE IF EXISTS quizzes;
        DROP TABLE IF EXISTS results;

        CREATE TABLE questions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            question TEXT NOT NULL,
            option_a TEXT NOT NULL,
            option_b TEXT NOT NULL,
            option_c TEXT NOT NULL,
            option_d TEXT NOT NULL,
            correct_answer TEXT NOT NULL
        );

        CREATE TABLE quizzes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE results (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            quiz_id INTEGER,
            question_id INTEGER,
            selected_answer TEXT,
            is_correct BOOLEAN,
            FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
            FOREIGN KEY (question_id) REFERENCES questions(id)
        );
        """
        # Run the SQL script to reset the database
        self.execute_script(sql_script)

    def insert_question(self, question, option_a, option_b, option_c, option_d, correct_answer):
        # Add a new question to the database
        self._cursor.execute(
            "INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?)",
            (question, option_a, option_b, option_c, option_d, correct_answer)
        )
        self._conn.commit()

    def fetch_random_questions(self, limit=5):
        # Get a random set of questions from the database
        self._cursor.execute("SELECT * FROM questions ORDER BY RANDOM() LIMIT ?", (limit,))
        return self._cursor.fetchall()

    def close(self):
        # Close the database connection
        self.close_db()
