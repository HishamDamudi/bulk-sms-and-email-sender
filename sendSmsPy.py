import csv
import subprocess
import time
import sys

def read_csv_file(csv_file):
    with open(csv_file, 'r') as file:
        reader = csv.reader(file)
        data = list(reader)
    return data

def send_message(phone_number, message):
    # Open messaging app
    subprocess.run(["adb", "shell", "am", "start", "-a", "android.intent.action.SENDTO", "-d", f"sms:{phone_number}"])

    # Wait for messaging app to open
    time.sleep(2)

    # Tap on message input field
    subprocess.run(["adb", "shell", "input", "tap", "500", "500"])  # Adjust coordinates if needed

    # Enter message
    subprocess.run(["adb", "shell", "input", "text", f'"{message}"'])  # Enclose message in double quotes

    # Tap on send button
    subprocess.run(["adb", "shell", "input", "keyevent", "22"])  # D-pad right
    subprocess.run(["adb", "shell", "input", "keyevent", "22"])  # D-pad right------
    subprocess.run(["adb", "shell", "input", "keyevent", "66"])  # Enter

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python script.py <csv_file>")
        sys.exit(1)

    # Get CSV file path from command line argument
    csv_file = sys.argv[1]

    # Load data from CSV file
    data = read_csv_file(csv_file)

    # Extract column names
    column_names = data[0]

    # Iterate over each row and send messages
    for row in data[1:]:  # Skip the first row (header row)
        phone_number = str(row[column_names.index('Phone')])
        message = str(row[column_names.index('Message')]).strip()
        send_message(phone_number, message)
