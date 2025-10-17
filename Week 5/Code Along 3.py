# Game board setup
theBoard = {'top-L': ' ', 'top-M': ' ', 'top-R': ' ',
            'mid-L': ' ', 'mid-M': ' ', 'mid-R': ' ',
            'low-L': ' ', 'low-M': ' ', 'low-R': ' '}


# Function to print the game board
def printBoard(board):
    print(f"{board['top-L']} | {board['top-M']} | {board['top-R']}")
    print("--+---+--")
    print(f"{board['mid-L']} | {board['mid-M']} | {board['mid-R']}")
    print("--+---+--")
    print(f"{board['low-L']} | {board['low-M']} | {board['low-R']}")


# Function to check if a player has won
def isWinner(bo, le):
    return ((bo['top-L'] == le and bo['top-M'] == le and bo['top-R'] == le) or  # across the top
            (bo['mid-L'] == le and bo['mid-M'] == le and bo['mid-R'] == le) or  # across the middle
            (bo['low-L'] == le and bo['low-M'] == le and bo['low-R'] == le) or  # across the bottom
            (bo['top-L'] == le and bo['mid-L'] == le and bo['low-L'] == le) or  # down the left side
            (bo['top-M'] == le and bo['mid-M'] == le and bo['low-M'] == le) or  # down the middle
            (bo['top-R'] == le and bo['mid-R'] == le and bo['low-R'] == le) or  # down the right side
            (bo['top-L'] == le and bo['mid-M'] == le and bo['low-R'] == le) or  # diagonal
            (bo['top-R'] == le and bo['mid-M'] == le and bo['low-L'] == le))  # diagonal


# Function to check if the game is a draw
def isDraw(board):
    for key in board:
        if board[key] == ' ':
            return False
    return True


# Function to handle the player's move
def playerMove(board, player):
    move = input(f"Player {player}, enter your move (top-L, top-M, top-R, mid-L, mid-M, mid-R, low-L, low-M, low-R): ")
    while move not in board or board[move] != ' ':
        move = input(f"Invalid move! Please try again, Player {player}: ")
    board[move] = player


# Function to handle the game loop
def playGame():
    print("Welcome to Tic-Tac-Toe!")
    printBoard(theBoard)
    currentPlayer = 'X'

    while True:
        playerMove(theBoard, currentPlayer)
        printBoard(theBoard)

        if isWinner(theBoard, currentPlayer):
            print(f"Player {currentPlayer} wins!")
            break

        if isDraw(theBoard):
            print("It's a draw!")
            break

        currentPlayer = 'O' if currentPlayer == 'X' else 'X'  # Switch player


# Start the game
playGame()
