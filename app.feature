CASOS DE TESTE

Descrição: Cadastro de usuários
ID: 1 - Cenário 1: Cadastro com credenciais válidas
Dado que eu estou na página de cadastro
Quando eu insiro Beatriz Mota no campo de Nome Completo
E insiro beatriz@example.com no campo de Email
E insiro 12345 no campo de Senha
E insiro  SESI no campo de Nome da Instituição
E insiro 654321 no campo de Identificação Profissional
Então os dados inseridos devem ser registrados no Banco de Dados

ID: 2 - Cenário 2: Cadastro com email já cadastrado 
Pré-condição: Cadastrar previamente o email testado
Dado que eu estou na página de cadastro
Quando eu insiro Beatriz Santos no campo de Nome Completo
E insiro beatriz@example.com no campo de Email
E insiro 54321 no campo de Senha
E insiro  SENAI no campo de Nome da Instituição
E insiro 123456 no campo de Identificação Profissional
Então a mensagem de erro “Este email já foi cadastrado por outro usuário” deve ser retornada

Descrição: Login de usuários
ID: 3 - Cenário 1: Login com credenciais válidas
Pré-condição: Cadastro do usuário testado
Dado que eu estou na página de login
Quando eu insiro Pedro Emanoel no campo de Nome Completo
E insiro pedro@example.com  no campo de Email
E insiro 123456 no campo de Senha
Então o login deve ser realizado

ID: 4 - Cenário 2: Login com credenciais inválidas
Pré-condição: Usuário testado não estar cadastrado
Dado que eu estou na página de login
Quando eu insiro beatriz@example.com no campo de Email
E insiro 123456 no campo de Senha
E o usuário não está cadastrado
Então a mensagem “Email ou senha incorretos” deve ser retornada

ID: 5 - Cenário 3: Verificação de login
Dado que eu estou na página de login
Quando eu  realizo o login
E verifico se estou logado a partir do ID  = 1
Então deve ser retornado verdadeiro

Descrição: Obtenção da média final
ID: 6 - Cenário 1: Obtenção da média pelo registro e cálculo das notas
Dado que eu estou na página principal
Quando eu insiro “7” no campo de Nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a variável que armazena o resultado deve conter a chave “media”
E a variável que armazena o resultado deve conter a chave “Aprovation”
E o resultado deve ser igual a  (“8”) 
E o status “APROVADO” deve ser retornado

Descrição: Tentativa de obtenção da média e aprovação com campo inválido
ID: 7 - Cenário 1: Campo de nota 1 inválido
Dado que eu estou na página principal
Quando eu insiro “-7” no campo de nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 8 - Cenário 2: Campo de nota 2 inválido
Dado que eu estou na página principal
Quando eu insiro “7” no campo de nota 1
E insiro “-8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 9 - Cenário 3: Campo de nota 3 inválido
Dado que eu estou na página principal
Quando eu insiro “7” no campo de nota 1
E insiro “8” no campo de Nota 2
E insiro “-9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 10 - Cenário 4: Campo de nota mínima inválido
Dado que eu estou na página principal
Quando eu insiro “7” no campo de nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “-8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

Descrição: Tentativa de obtenção da média e aprovação com campo nulo
ID: 11 - Cenário 1: Campo de nota 1 nulo
Dado que eu estou na página principal
Quando eu não insiro nenhuma nota no campo de nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 12 - Cenário 2: Campo de nota 2 nulo
Dado que eu estou na página principal
Quando eu insiro ”7” no campo de nota 1
E não insiro nenhuma nota no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 13 - Cenário 3: Campo de nota 3 nulo
Dado que eu estou na página principal
Quando eu insiro ”7” no campo de nota 1
E insiro “8” no campo de Nota 2
E não insiro nenhuma nota no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

ID: 14 - Cenário 4: Campo de nota mínima nulo
Dado que eu estou na página principal
Quando eu insiro ”7” no campo de nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E não insiro nenhuma nota no campo de Nota Mínima
Então a mensagem de erro “As notas devem conter valores válidos” deve ser retornada

Descrição: Obtenção da aprovação final
ID: 15 -  Cenário 1: Obtenção da aprovação “APROVADO” pelo registro e cálculo das notas
Dado que eu estou na página principal
Quando eu insiro “7” no campo de Nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então o status “APROVADO” deve ser retornado
E a mensagem “As notas devem conter valores válidos” não deve ser retornada

ID: 16 - Cenário 2: Obtenção da aprovação “REPROVADO” pelo registro e cálculo das notas
Dado que eu estou na página principal
Quando eu insiro “7” no campo de Nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “9” no campo de Nota Mínima
Então o status “REPROVADO” deve ser retornado
E a mensagem “As notas devem conter valores válidos” não deve ser retornada

Descrição: Salvamento das informações
ID: 17 -  Cenário 1: Notas e média salvas no banco de dados
Dado que eu estou na página principal
Quando eu insiro “7” no campo de Nota 1
E insiro “8” no campo de Nota 2
E insiro “9” no campo de Nota 3
E insiro “8” no campo de Nota Mínima
Então a mensagem “As notas devem conter valores válidos” não deve ser retornada
E as 3 notas (7, 8 e 9), a nota mínima (8) e a média (8) devem ser salvas no banco de dados

EM INGLÊS

TEST CASES

Description: User registration
ID: 1 - Scenario 1: Registration with valid credentials
Given that I am on the registration page
When I enter Beatriz Mota in the Full Name field
And I enter beatriz@example.com in the Email field
And I enter 12345 in the Password field
And I enter SESI in the Institution Name field
And I enter 654321 in the Professional Identification field
Then the data entered should be recorded in the Database

ID: 2 - Scenario 2: Registration with an email address already registered
Precondition: Previously register the tested email address
Given that I am on the registration page
When I enter Beatriz Santos in the Full Name field
And I enter beatriz@example.com in the Email field
And I enter 54321 in the Password field
And I enter SENAI in the Institution Name field
And I enter 123456 in the Professional ID field
Then the error message “This email has already been registered by another user” should be returned

Description: User login
ID: 3 - Scenario 1: Login with valid credentials
Precondition: Test user registration
Given that I am on the login page
When I enter Pedro Emanoel in the Full Name field
And I enter pedro@example.com in the Email field
And I enter 123456 in the Password field
Then the login should be successful

ID: 4 - Scenario 2: Login with invalid credentials
Precondition: Tested user is not registered
Given that I am on the login page
When I enter beatriz@example.com in the Email field
And enter 123456 in the Password field
And the user is not registered
Then the message “Incorrect email or password” should be returned

ID: 5 - Scenario 3: Login verification
Given that I am on the login page
When I log in
And I check if I am logged in from ID = 1
Then true should be returned

Description: Obtaining the final average
ID: 6 - Scenario 1: Obtaining the average by recording and calculating grades
Given that I am on the main page
When I enter “7” in the Grade 1 field
And I enter “8” in the Grade 2 field
And I enter “9” in the Grade 3 field
And I enter “8” in the Minimum Grade field
Then the variable that stores the result should contain the key “average”
And the variable that stores the result should contain the key “Approval”
And the result should be equal to (“8”) 
And the status “APPROVED” should be returned

Description: Attempt to obtain average and approval with invalid field
ID: 7 - Scenario 1: Invalid grade field 1
Given that I am on the main page
When I enter “-7” in grade field 1
And enter “8” in grade field 2
And enter “9” in grade field 3
And I enter “8” in the Minimum Grade field
Then the error message “Grades must contain valid values” should be returned

ID: 8 - Scenario 2: Invalid grade field 2
Given that I am on the main page
When I enter “7” in the grade field 1
And I enter “-8” in the Grade field 2
And I enter “9” in the Grade 3 field
And I enter “8” in the Minimum Grade field
Then the error message “Grades must contain valid values” should be returned

ID: 9 - Scenario 3: Invalid Grade 3 field
Given that I am on the main page
When I enter “7” in the Grade 1 field
And I enter “8” in the Grade 2 field
And I enter “-9” in the Grade 3 field
And I enter “8” in the Minimum Grade field
Then the error message “Grades must contain valid values” should be returned

ID: 10 - Scenario 4: Invalid field for minimum grade
Suppose I am on the main page.
If I enter “7” in the field for grade 1.
And “8” in the field for grade 2.
And “9” in the field for grade 3.
And “-8” in the field for minimum grade.
Then the error message “Grades must contain valid values” should be displayed

Description: Attempt to determine the average and pass mark with an empty field
ID: 11 - Scenario 1: Empty field for grade 1
As I am on the main page
If I do not enter any grade in the field for grade 1
And enter “8” in the field for grade 2
And enter “9” in the “Grade 3” field
And enter “8” in the “Minimum grade” field
Then the error message “Grades must contain valid values” should be displayed

ID: 12 - Scenario 2: Empty “Grade 2” field
As I am on the main page
If I enter “7” in the “Grade 1” field
And do not enter any grade in the “Grade 2” field
And enter “9” in the “Grade 3” field
And enter “8” in the “Minimum grade” field
Then the error message “Grades must contain valid values” should be displayed

ID: 13 - Scenario 3: Null grade field 3
Given that I am on the main page
When I enter “7” in grade field 1
And enter “8” in grade field 2
And do not enter any grade in grade field 3
And enter “8” in minimum grade field
Then the error message “Grades must contain valid values” should be returned

ID: 14 - Scenario 4: Minimum grade field is null
Given that I am on the main page
When I enter “7” in the grade 1 field
And enter “8” in the grade 2 field
And enter “9” in the grade 3 field
And I do not enter any grade in the Minimum Grade field
Then the error message “Grades must contain valid values” should be returned

Description: Obtaining final approval
ID: 15 - Scenario 1: Obtaining “APPROVED” approval by recording and calculating grades
Given that I am on the main page
When I enter “7” in the Grade 1 field
And I enter “8” in the Grade 2 field
And I enter “9” in the Grade 3 field
And I enter “8” in the Minimum Grade field
Then the status “APPROVED” should be returned
And the message “Grades must contain valid values” should not be returned

ID: 16 - Scenario 2: Obtaining a “FAIL” grade by recording and calculating grades
Given that I am on the main page
When I enter “7” in the Grade 1 field
And enter “8” in the Grade 2 field
And I enter “9” in the Grade 3 field
And I enter “9” in the Minimum Grade field
Then the status “FAILED” should be returned
And the message “Grades must contain valid values” should not be returned

Description: Saving information
ID: 17 - Scenario 1: Grades and averages saved in the database
Given that I am on the main page
When I enter “7” in the Grade 1 field
And enter “8” in the Grade 2 field
And I enter “9” in the Grade 3 field
And I enter “8” in the Minimum Grade field
Then the message “Grades must contain valid values” should not be returned
And the 3 grades (7, 8, and 9), the minimum grade (8), and the average (8) should be saved in the database
