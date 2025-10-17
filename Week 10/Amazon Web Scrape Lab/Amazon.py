from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
import time
import os

chrome_options = Options()
chrome_options.add_argument('--headless')
chrome_options.add_experimental_option('excludeSwitches', ['enable-logging'])

os.environ['WDM_LOG_LEVEL'] = '0'
s = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service = s, options=chrome_options)
#driver = webdriver.Chrome(s.path, options=chrome_options) # if you have service problems on line 15

driver.get("https://www.amazon.com/deals")
time.sleep(5)

deal_elems = driver.find_elements(By.CSS_SELECTOR, '[class*="DealGridItem-module__dealItemContent"] > div')

deal_titles = []
deal_links = []

for deal_elem in deal_elems:
    deal_titles.append(deal_elem.find_element(By.CSS_SELECTOR, 'a.a-text-normal > [class*="DealContent-module__truncate"]').text)
    deal_links.append(deal_elem.find_element(By.CSS_SELECTOR, 'a.a-text-normal').get_attribute('href'))

title_with_links = dict(zip(deal_titles, deal_links))
print(title_with_links)
