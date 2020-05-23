* Settings *
Library  SeleniumLibrary
* Variables *
${browser}  Chrome
${pagina}  http://localhost:8000/
${usuario}  expi@expi.com.mx
${pass}  prueba
${ini}

* Test Cases *
test_create_tour
    Open browser  ${pagina}  ${browser}
    login
    sleep  3s
    close browser

* Keywords *

login
    input text  id:email   ${usuario}
    input text  name:password   ${pass}
    click element  xpath:/html/body/div[2]/div/div/div/div/div/div/form/div/div[5]
