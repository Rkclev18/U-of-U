import sqlite3
import random
from db_base import DBBase

class DBOperations(DBBase):
    def __init__(self, db_name):
        # Get the database connection and cursor
        super().__init__(db_name)
        self.conn = self.get_connection
        self.cursor = self.get_cursor

    def get_random_questions(self, num_questions=5):
        # Get a random selection of questions from the database
        try:
            self.cursor.execute("SELECT * FROM questions")
            all_questions = self.cursor.fetchall()
            return random.sample(all_questions, min(num_questions, len(all_questions)))
        except sqlite3.Error as e:
            print(f"Error fetching random questions: {e}")
            return []

    def add_question(self, question, option_a, option_b, option_c, option_d, correct_answer):
        # Add a new question to the database
        try:
            query = """
             INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct_answer) 
             VALUES (?, ?, ?, ?, ?, ?)
             """
            self.cursor.execute(query, (question, option_a, option_b, option_c, option_d, correct_answer))
            self.conn.commit()
        except Exception as e:
            print(f"Error adding question: {e}")

    def read_questions(self):
        # Get all questions from the database
        self.cursor.execute("SELECT * FROM questions")
        return self.cursor.fetchall()

    def update_question(self, question_id, new_question, option_a, option_b, option_c, option_d, correct_answer):
        # Update a question by its ID
        try:
            query = """
            UPDATE questions 
            SET question = ?, option_a = ?, option_b = ?, option_c = ?, option_d = ?, correct_answer = ? 
            WHERE id = ?
            """
            self.cursor.execute(query, (new_question, option_a, option_b, option_c, option_d, correct_answer, question_id))
            self.conn.commit()
        except sqlite3.Error as e:
            print(f"Error updating question: {e}")

    def delete_question(self, question_id):
        # Delete a question by its ID
        try:
            query = "DELETE FROM questions WHERE id = ?"
            self.cursor.execute(query, (question_id,))
            self.conn.commit()
        except sqlite3.Error as e:
            print(f"Error deleting question: {e}")

    def create_quiz(self, user_name):
        # Create a new quiz for a user
        try:
            self.cursor.execute('''INSERT INTO quizzes (user_name) VALUES (?)''', (user_name,))
            self.conn.commit()
            return self.cursor.lastrowid  # Return the ID of the new quiz
        except sqlite3.Error as e:
            print(f"Error creating quiz: {e}")
            return None

    def read_quizzes(self):
        # Get all quizzes from the database
        self.cursor.execute("SELECT * FROM quizzes")
        return self.cursor.fetchall()

    def delete_quiz(self, quiz_id):
        # Delete a quiz by its ID
        try:
            self.cursor.execute("DELETE FROM quizzes WHERE id=?", (quiz_id,))
            self.conn.commit()
        except sqlite3.Error as e:
            print(f"Error deleting quiz: {e}")

    def create_quiz_response(self, quiz_id, question_id, user_answer, correct):
        # Save a user's answer to a quiz question
        try:
            self.cursor.execute('''
                INSERT INTO quiz_responses (quiz_id, question_id, user_answer, correct) 
                VALUES (?, ?, ?, ?)''', (quiz_id, question_id, user_answer, correct))
            self.conn.commit()
        except sqlite3.Error as e:
            print(f"Error adding quiz response: {e}")

    def read_quiz_responses(self, quiz_id):
        # Get all responses for a specific quiz
        self.cursor.execute("SELECT * FROM quiz_responses WHERE quiz_id=?", (quiz_id,))
        return self.cursor.fetchall()

    def delete_quiz_responses(self, quiz_id):
        # Delete all responses for a specific quiz
        try:
            self.cursor.execute("DELETE FROM quiz_responses WHERE quiz_id=?", (quiz_id,))
            self.conn.commit()
        except sqlite3.Error as e:
            print(f"Error deleting quiz responses: {e}")

    def close_connection(self):
        # Close the database connection
        self.conn.close()
