def grade_quiz(quiz, answers):
    # Start the score at 0
    score = 0
    # Total number of questions in the quiz
    total = len(quiz)

    # Loop through each question and the user's answers
    for i, question in enumerate(quiz):
        correct = question["correct_answer"]       # Get the correct answer
        user_answer = answers[i]                   # Get the user's answer

        # Compare answers (case-insensitive)
        if user_answer.upper() == correct.upper():
            score += 1                             # Add 1 to score if correct

    # Return the final score as a string
    return f"Your score: {score}/{total}"
