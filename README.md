# iautp (Chatbot)
Agente Inteligente para el soporte del Sistema de Matrículas de la Universidad Tecnológica de Panamá
# Instalación
1.	Instalar Python 2.7

2.	Abrir `cmd.exe` y ejecutar para ir al disco local C: `cd\`

3.	Si se necesita ir a otro disco ejecutar, por ejemplo el disco E: `cd /d E:`

4.	Ejecutar para ir al directorio del chatbot, por ejemplo: `cd %USERPROFILE%\Documents\chatbot`

5. 	Asignar la ruta de la carpeta de Python27 ejecutando:	`Set Path=C:/Python27`

6. 	Instalar pip ejecutando la siguiente linea de comando:	`python get-pip.py`

7. 	Ejecutar linea de comando para instalar requerimientos:	`pip install -r requerimientos.txt`

8. 	Correr el server con la linea de comando: `python main.py`

9.	Abrir el navegador web y buscar la direccion: `localhost:5000`
# Demo
- http://ia-utp.ml/
![Demo](https://raw.githubusercontent.com/Yizack/iautp/master/Captura1.png)

## Preguntas que se pueden hacer 
Cada pregunta se puede hacer de diferentes maneras. ([ver los archivos aiml](https://github.com/Yizack/iautp/tree/master/aiml/utp))
##### Sistema de matrícula `aiml/utp/matricula.aiml`
1.	¿Puedo ver los estudiantes matriculados en un grupo?
2.	Se me olvidó la contraseña del sitio de matricula
3.	Se me olvidó la clave del wifi
4.	¿Cómo solicito un cambio de nota?
5.	¿Cómo realiza el sistema el cálculo automático de índice?
6.	¿Dónde puedo imprimir la constancia no oficial de mi matricula?
7.	¿Por qué en la prematricula aparece que no estoy activo?
8.	¿Por qué no me aparecen notas del semestre anterior?
9.	¿Dónde puedo ver el estatus de mi solicitud de retiro inclusión?
10.	¿Dónde puedo consultar las materias de mi plan de estudio?
11.	¿Por qué no me aparecen materias pendientes?
12.	¿Por qué el sistema me envía el mensaje que el grupo donde me quiero matricular está cerrado?
13.	¿Qué hacer si me equivoco al captar la solicitud de retiro inclusión?
14.	¿Qué hacer si me equivoco al enviar los códigos de horario que deseo matricular?
15.	Tengo cambio de carrera y me aparece una condicional
16.	¿Cuándo puedo ir a retirar mi constancia?
17.	¿Dónde puedo ver los horarios de los grupos ofertados?
18.	¿Por qué no se le generó cita?
19.	Estudiante sin cita asignada
20.	¿Qué hacer cuando el estudiante le aparece un saldo pendiente?
21.	¿Qué hacer cuando el estudiante tiene estatus de inactivo y no es por morosidad?
22.	¿Qué hacer cuando el estudiante está inactivo por morosidad?
23.	¿Como puedo saber mi horario?
24.	¿Cuál es el sitio de matrículas?
##### Interacciones adicionales `aiml/utp/usuario.aiml`
25. Hola
26. Mi nombre es
27. ¿Cual es mi nombre?
28. ¿Cómo te llamas?
29. Adios
30. ¿Quién te creó?
31. Oye
32. ¿Que haces?
33. ¿De donde eres?
