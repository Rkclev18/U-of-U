import db_base as db
import csv
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt



class CollegeScoreCard:

    def __init__(self, row):
        self.id = row[0]
        self.name = row[1]
        self.state = row[2]
        self.act = row[3]
        self.sat = row[4]
        self.enroll = row[5]
        self.tuition = row[6]
        self.postgrad = row[7]
        self.compl_rate = row[8]
class CsvLab(db.DBbase):

    # id,name,state,act_med,sat_avg,enrollment,tuition,postgrad_income_10yr,completion_rate
    def reset_database(self):

        try:
            sql = """
                DROP TABLE IF EXISTS CollageScoreCard;
                
                CREATE TABLE CollegeScoreCard (
                    id INTEGER NOT NULL PRIMARY KEY UNIQUE,
                    name TEXT,
                    state_abbr varchar(2) NOT NULL,
                    act_med INTEGER,
                    sat_avg INTEGER,
                    enrollment INTEGER,
                    tuition INTEGER,
                    postgrad_income_10yr INTEGER,
                    completion_rate REAL
                    
                );
            """
            super().execute_script(sql)
        except Exception as e:
            print(e)

    def read_college_data(self, file_name):
        self.college_scores_list = []

        try:
            with open(file_name, 'r') as record:
                csv_contents = csv.reader(record)
                next(record)
                for row in csv_contents:
                    # print(row)
                    college = CollegeScoreCard(row)
                    self.college_scores_list.append(college)


        except Exception as e:
            print(e)

    def save_to_database(self):
        print("Number of records to save: ", len(self.college_scores_list))
        save = input("Continue? ").lower()

        if save == "y":
            for item in self.college_scores_list:
                item.act = item.act.replace("NaN", "0")
                item.sat = item.sat.replace("NaN", "0")
                item.postgrad = item.postgrad.replace("NaN", "0")
                item.compl_rate = item.compl_rate.replace("NaN", "0")

                """
                id INTEGER NOT NULL PRIMARY KEY UNIQUE,
                    name TEXT,
                    state_abbr varchar(2) NOT NULL,
                    act_med INTEGER,
                    sat_avg INTEGER,
                    enrollment INTEGER,
                    tuition INTEGER,
                    postgrad_income_10yr INTEGER,
                    completion_rate REAL
                """

                try:
                    super().get_cursor.execute(""" INSERT INTO CollegeScoreCard
                    (id, name, state_abbr, act_med, sat_Avg, enrollment, tuition, postgrad_income_10yr, completion_rate)
                        VALUES( ?,?,?,?,?,?,?,?,?)""",
                        (item.id, item.name, item.state, item.act, item.sat, item.enroll, item.tuition, item.postgrad, item.compl_rate))
                    super().get_connection.commit()

                    print("Saved item: ", item.id, item.name, item.state)
                except Exception as e:
                    print()
            else:
                print("Save to DB aborted")

    def visualize_date(self):
        df = pd.read_sql_query("SELECT * FROM CollegeScoreCard", super().get_connection)
        print(df.head())
        print(df.info)

        print(df[df['state_abbr'] == 'CA']['act_med'])
        print(self.columns(df))
        states = df.groupby('state_abbr')
        print('MAX SAT = ', self.max_Act(states))
        print(round(states.mean()['tuition'].min(), 2))
        print(round(states.mean()['tuition'].max(), 2))

        #using pandas for insights
        print("# of unique states", df['state_abbr'].nunique())
        print(df.corr())
        states = df.groupby('state_abbr')
        print('MAX SAT = ', self.max_Act(states))
        print(round(states.mean()['tuition'].min(), 2))
        print(round(states.mean()['tuition'].max(), 2))
        print('Mean tuition rate', round(df['tuition'].mean(), 2))
        print('Mean SAT-Score rate', round(df['sat_avg'].mean(), 2))

        sns.displot(df['tuition'])
        plt.show()

        sns.heatmap(df.corr(), cmap='coolwarm')
        plt.show()





    def max_Act(self, series):
        return series['sat_avg'].max()

    def columns(self, series):
        return series.columns

csv_lab = CsvLab("CollegeScoreCardDB.sqlite")
csv_lab.visualize_date()
csv_lab.read_college_data("CollegeScoreCard_Exercise.csv")
csv_lab.save_to_database()

