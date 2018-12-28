from flask import Flask, render_template, request, jsonify, send_file
import aiml
import os

kernel = aiml.Kernel()
app = Flask(__name__)

@app.route("/")
def hello():
    return render_template('chat.html')
	
@app.route("/css/chat.css")
def get_css():
    filename = 'templates/css/chat.css'
    return send_file(filename, mimetype='text/css')
	
@app.route("/images/utp-gris.png")
def get_image():
    filename = 'images/utp-logo-gris.png'
    return send_file(filename, mimetype='image/png')
	
@app.route("/images/favicon.ico")
def get_image2():
    filename = 'images/favicon.ico'
    return send_file(filename, mimetype='image/vnd.microsoft.icon')

@app.route("/ask", methods=['POST'])
def ask():
	message = request.form['messageText'].encode('utf-8').strip()
	if os.path.isfile("bot_brain.brn"):
	    kernel.bootstrap(brainFile = "bot_brain.brn")
	else:
	    kernel.bootstrap(learnFiles = os.path.abspath("aiml/std-startup.xml"), commands = "load aiml b")
	    kernel.saveBrain("bot_brain.brn")

	# kernel now ready for use
	while True:
	    if message == "":
			print("ERROR: No se ha escrito nada")
			exit()
	    else:
			bot_response = kernel.respond(message)
			print("######################")
			print("Pregunta:")
			print message.decode('utf8')
			print("\nRespuesta:")
			print bot_response.decode('utf8')
			print("######################")
			return jsonify({'status':'OK','answer':bot_response})

if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)
