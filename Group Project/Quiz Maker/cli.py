from db_operations import DBOperations
from quiz_generator import generate_quiz
from quiz_grading import grade_quiz


def add_question(db): #Adds the question
    question = input("Enter the question: ")
    option_a = input("Enter option A: ")
    option_b = input("Enter option B: ")
    option_c = input("Enter option C: ")
    option_d = input("Enter option D: ")
    correct_answer = input("Enter the correct answer (A/B/C/D): ")

    db.add_question(question, option_a, option_b, option_c, option_d, correct_answer) #Adds question to the DB
    print("✅ Question added successfully!")


def update_question(db): #Updates questions in DB
    question_id = input("Enter the ID of the question to update: ")
    new_question = input("Enter the new question: ")
    option_a = input("Enter new option A: ")
    option_b = input("Enter new option B: ")
    option_c = input("Enter new option C: ")
    option_d = input("Enter new option D: ")
    correct_answer = input("Enter the new correct answer (A/B/C/D): ")

    db.update_question(question_id, new_question, option_a, option_b, option_c, option_d, correct_answer) #Updates questions in DB
    print("✅ Question updated successfully!")


def delete_question(db): #Deletes questions in DB
    question_id = input("Enter the ID of the question to delete: ")
    db.delete_question(question_id)
    print("✅ Question deleted successfully!")


# Initiates the quiz maker
def start_quiz():
    db = DBOperations("quiz.db")
    user_name = input("Enter your name: ") # Ask for user's name
    quiz_id = db.create_quiz(user_name)
    if not quiz_id:
        print("⚠️ Could not create quiz. Exiting.")
        return
    # How we show the menu until the user decides to exit
    while True:
        print("\n1. Take a Quiz")
        print("2. Add a Question")
        print("3. Update a Question")
        print("4. Delete a Question")
        print("5. Exit")
        # Get user's menu choice
        choice = input("Choose an option: ")
        # Option 1: Add a new user to the system
        if choice == "1":
            quiz = generate_quiz()
            answers = []

            for q in quiz:
                print(f"\n{q['question']}")
                print(f"A) {q['A']}")
                print(f"B) {q['B']}")
                print(f"C) {q['C']}")
                print(f"D) {q['D']}")
                answer = input("Your answer (A/B/C/D): ").upper()


                correct_answer = 1 if answer == q['correct_answer'] else 0
                db.create_quiz_response(quiz_id, q['id'], answer, correct_answer) # Add response to the DB
                answers.append(answer)

            print("\n" + grade_quiz(quiz, answers))
        elif choice == "2":  # Option 2: Add a question
            add_question(db)
        elif choice == "3": # Option 3: Update Questions
            update_question(db)
        elif choice == "4":  # Option 4: Delete Question
            delete_question(db)
        elif choice == "5": # Option 5: Exit out
            db.close_connection()
            break
        else: # Handle invalid menu choices
            print("Invalid option. Please try again.")  # Prompt user to try again if input is invalid

