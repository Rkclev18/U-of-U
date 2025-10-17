# File Open Mode Cheat Sheet:
#
# r = reading, this is the default mode.
# r+ = Opens a file for both reading and writing.
# w = Opens a file for writing only. Overwrites the file if the file exists.
# If the file does not exist, creates a new file for writing.
# w+ = Opens a file for both writing and reading.
# Overwrites the existing file if the file exists.
# If the file does not exist, it creates a new file for reading and writing.
# a = Opens a file for appending. The file pointer is at the end of the file if the file exists.
# That is, the file is in the append mode. If the file does not exist, it creates a new file for writing.
# a+ = Opens a file for both appending and reading. The file pointer is at the end of the file if the file exists. The file opens in the append mode.
# If the file does not exist, it creates a new file for reading and writing.r = reading, this is the default mode.
# r+ = Opens a file for both reading and writing.
# w = Opens a file for writing only. Overwrites the file if the file exists.
# If the file does not exist, creates a new file for writing.
# w+ = Opens a file for both writing and reading.
# Overwrites the existing file if the file exists.
# If the file does not exist, it creates a new file for reading and writing.
# a = Opens a file for appending. The file pointer is at the end of the file if the file exists.
# That is, the file is in the append mode. If the file does not exist, it creates a new file for writing.
# a+ = Opens a file for both appending and reading. The file pointer is at the end of the file if the file exists. The file opens in the append mode.
# If the file does not exist, it creates a new file for reading and writing.

while True:
    file_name = input("Enter a file name: ")
    try:
        fhandle = open(file_name, "r+")
        contents = fhandle.read()
        print(contents)

        while True:
            text = input("What do you want to write out? ")
            if text.lower() == "done":
                break

            fhandle.write(text + "\n")
    except Exception as ex:
        print(ex)
    else:
        break

