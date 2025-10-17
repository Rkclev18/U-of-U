import sqlite3
import csv

def create_tables():
    # Connect to the quiz database
    conn = sqlite3.connect('quiz.db')
    c = conn.cursor()

    # Create the 'questions' table if it doesn't already exist
    c.execute('''
    CREATE TABLE IF NOT EXISTS questions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        question TEXT NOT NULL,
        option_a TEXT NOT NULL,
        option_b TEXT NOT NULL,
        option_c TEXT NOT NULL,
        option_d TEXT NOT NULL,
        correct_answer TEXT NOT NULL
    )
    ''')

    # Create the 'quizzes' table to store quiz attempts
    c.execute('''
    CREATE TABLE IF NOT EXISTS quizzes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_name TEXT NOT NULL,
        date_taken TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ''')

    # Create the 'quiz_responses' table to store user answers and whether they were correct
    c.execute('''
    CREATE TABLE IF NOT EXISTS quiz_responses (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        quiz_id INTEGER,
        question_id INTEGER,
        user_answer TEXT NOT NULL,
        correct BOOLEAN,
        FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
        FOREIGN KEY (question_id) REFERENCES questions(id)
    )
    ''')

    conn.commit()
    conn.close()

def populate_questions(csv_file):
    # Connect to the database
    conn = sqlite3.connect('quiz.db')
    c = conn.cursor()

    # Open and read the CSV file containing quiz questions
    with open(csv_file, 'r') as file:
        reader = csv.reader(file)
        next(reader)

        # Go through each row in the CSV and insert into the questions table
        for row in reader:
            question, option_a, option_b, option_c, option_d, correct_answer = row
            try:
                c.execute('''
                INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct_answer)
                VALUES (?, ?, ?, ?, ?, ?)
                ''', (question, option_a, option_b, option_c, option_d, correct_answer))
            except sqlite3.Error as e:
                print(f"Error inserting question: {e}")

    conn.commit()
    conn.close()

if __name__ == "__main__":
    create_tables()
    populate_questions('questions.csv')
