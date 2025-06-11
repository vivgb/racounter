from selenium import webdriver
from selenium.webdriver.common.by import By 
import time

driver = webdriver.Chrome()

driver.get("http://localhost/racounter/paginas/adm.php")

# Clica no botão de clicar novo usuário
novoUsuario_button = driver.find_element(By.ID, "btnCriarUsuario")
novoUsuario_button.click()

# Preenche o campo nome 
nome_input = driver.find_element(By.ID, "nNome")
nome_input.send_keys("Alan")

# Preenche o campo email
email_input = driver.find_element(By.ID, "nEmail")
email_input.send_keys("alan@gmail.com")

# Preenche o campo senha
senha_input = driver.find_element(By.ID, "nSenha")
senha_input.send_keys("ab123")

# Clica no checkbox de ativo
ativo_input = driver.find_element(By.CSS_SELECTOR, "type=['checkbox']")
ativo_input.click()


time.sleep(5)

# Clica no botão de submit
salvar_button = driver.find_element(By.CSS_SELECTOR, "type=['submit']")
salvar_button.click()

time.sleep(5)





