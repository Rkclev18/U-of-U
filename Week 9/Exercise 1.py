import csv
import sqlite3


conn = sqlite3.connect("veggies.db")
cursor = conn.cursor()


cursor.execute("DROP TABLE IF EXISTS Veggies")
cursor.execute("""
    CREATE TABLE Veggies (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        color TEXT,
        calories INTEGER,
        carbs REAL,
        fiber REAL
    )
""")


with open("veggies.csv", newline='') as csvfile:
    reader = csv.reader(csvfile)
    header = next(reader)
    for row in reader:
        print(row)
        cursor.execute("""
            INSERT INTO Veggies (name, color, calories, carbs, fiber)
            VALUES (?, ?, ?, ?, ?)
        """, (row[0], row[1], int(row[2]), float(row[3]), float(row[4])))

# Commit and close
conn.commit()
conn.close()
