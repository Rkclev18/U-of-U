from db_operations import DBOperations

def generate_quiz():
    db_ops = DBOperations('quiz.db')
    # Get a random list of questions from the database
    questions = db_ops.get_random_questions()

    quiz = []
    for q in questions:
        # Create a dictionary for each question
        question_dict = {
            "id": q[0],
            "question": q[1],
            "A": q[2],
            "B": q[3],
            "C": q[4],
            "D": q[5],
            "correct_answer": q[6]
        }
        quiz.append(question_dict)  # Add the question to the quiz list

    return quiz  # Return the full list of quiz questions
