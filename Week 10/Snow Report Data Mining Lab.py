from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
import time
import os

chrome_options = Options()
#chrome_options.add_argument('--headless')
chrome_options.add_experimental_option('excludeSwitches', ['enable-logging'])

os.environ['WDM_LOG_LEVEL'] = '0'
s = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service = s, options=chrome_options)
#driver = webdriver.Chrome(s.path, options=chrome_options) # if you have service problems on line 15

driver.get("https://www.skiutah.com/snowreport")
time.sleep(5)

hour_24 = driver.find_element(By.CSS_SELECTOR, '#snow-report-summary-snowbird > div > div:nth-child(2) > div.SnowReportSummary-content > div > div:nth-child(1) > div:nth-child(1) > div > span:nth-child(1)').get_attribute('innerHTML')

hour_48 = driver.find_element(By.CSS_SELECTOR, '#snow-report-summary-snowbird > div > div:nth-child(2) > div.SnowReportSummary-content > div > div:nth-child(1) > div:nth-child(2) > div > span:nth-child(1)').get_attribute('innerHTML')

base = driver.find_element(By.CSS_SELECTOR, '#snow-report-summary-snowbird > div > div:nth-child(2) > div.SnowReportSummary-content > div > div:nth-child(1) > div:nth-child(3) > div > span:nth-child(1)').get_attribute('innerHTML')

report = '24 hour snowfall: ' + hour_24 \
    + '\n48 hour snowfall: ' + hour_48 \
        +'\nbase depth: ' +base

print(report)
