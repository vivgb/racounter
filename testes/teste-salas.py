from selenium import webdriver
from selenium.webdriver.common.by import By 
import time

driver = webdriver.Chrome()

driver.get("http://localhost/racounter/paginas/salas.php")

nova_sala = driver.find_element(By.ID, "novaSala")
nova_sala.click()

# Preenche o campo descrição
descricao_input = driver.find_element(By.ID, "classTitle")
descricao_input.send_keys("sala 399") 

# Preenche o campo lotacao
lotacao_input = driver.find_element(By.ID, "classLotacao")
lotacao_input.send_keys("20")

# Preenche o campo usuário vinculado
#usuarioVinc_option = driver.find_element(By.ID, "id_usuario")
##usuarioVinc_option.click("Gustavo")

time.sleep(10)

submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()

time.sleep(3)

driver.quit()




