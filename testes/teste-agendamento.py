from selenium import webdriver
from selenium.webdriver.common.by import By 
import time

driver = webdriver.Chrome()

driver.get("http//C:/xampp/htdocs/racounter/paginas/agendamento.php")

# Preenche o campo descrição
titulo_input = driver.find_element(By.ID, "eventTitle")
titulo_input.send_keys("Evento Acadêmico") 

# Preenche o campo data
data_input = driver.find_element(By.ID, "eventDate")
data_input.send_keys("13062025")

# Seleciona a sala
#sala_option = driver.find_element(By.)
#time.sleep(10)

submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()

time.sleep(10)

driver.quit()




