import csv
with open('horariosFormatado.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        print(row)
