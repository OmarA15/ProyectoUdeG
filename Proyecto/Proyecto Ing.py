import tkinter as tk
from tkinter import *
from PIL import Image, ImageTk
from urllib.request import urlopen
from urllib.parse import quote
from tkinter import messagebox, ttk
from time import strftime

#____________________Funciones__________________________________________________

def Salir():
    raiz.destroy()

#memoria, metodo delete es especialito pon espacio sino no jala el metodo
def limpiar():
    #InputName.delete('1.0', 'end')
    InputName.delete('0', 'end')
    InputCar.delete(0, 'end')
    InputDate.delete(0, 'end')
    InputGate.delete(0, 'end')
    InputID.delete(0, 'end')
    InputPlace.delete(0, 'end')
    InputColor.delete(0, 'end')
    InputHour.delete(0, 'end')

def obtener_Tiempo():
    Hora = strftime('%H:%M:%S')
    Dia = strftime('%A')
    Fecha = strftime('%d/%m/%y')

    x = texto_hora.winfo_height()
    t = int((x-5)*0.32)

    if Dia == 'Monday':
        Dia = 'Lunes'
    elif Dia == 'Tuesday':
          Dia = 'Martes'
    elif Dia == 'Wednesday': 
          Dia = 'Miercoles'
    elif Dia == 'Thursday': 
          Dia = 'Jueves'
    elif Dia == 'Fridat':
          Dia = 'Viernes'
    elif Dia == 'Saturday':
         Dia = 'Sabado'
    elif Dia == 'Sunday':
         Dia = 'Domingo'

    texto_hora.config(text=Hora, font=('Arial',25))
    texto_dia.config(text=Dia,font=('Arial',25))
    texto_fecha.config(text=Fecha,font=('Arial',25))

    texto_hora.after(1000, obtener_Tiempo)

def Registrar():
    nombre = quote(InputName.get())
    carro = quote(InputCar.get())
    color = quote(InputColor.get())
    placas = quote(InputID.get())
    hora = quote(InputHour.get())
    dia = quote(InputDate.get())
    modulo = quote(InputPlace.get())
    puertaEntrada = quote(InputGate.get())
    
    url = "https://pr0yectov1aw3b.000webhostapp.com/proyectoWeb/CapturadeDatos.php?nombre={}&carro={}&color={}&placas={}&hora={}&dia={}&modulo={}&puertaEntrada={}".format(nombre, carro, color, placas, hora, dia, modulo, puertaEntrada)
    
    r = urlopen(url)
    r.close()

#____________________Raiz_________________________________________________
raiz = tk.Tk()
raiz.geometry('1050x850')

raiz.configure(bg='#312FC3')
raiz.title('Estacionamiento')

#Hacer un Reloj(Tiempo real) en la parte de abajo de los botones con fecha 
#______________________________Hora________________________________________
texto_hora = Label(raiz, fg= 'white', bg='black')
texto_hora.grid(row=5,column=3)

texto_dia = Label(raiz,fg= 'white', bg='#312FC3')
texto_dia.grid(row=7,column=3)

texto_fecha = Label(raiz,fg= 'white', bg='#312FC3')
texto_fecha.grid(row=6,column=3)

#__________________________________________________________________________


#____________________________Imagen de UdG _________________________________________________


#Abre la imagen de FondoA
LogoUDG = Image.open("UdeG.png")
#Ajusta el tamaño de la imagen 
LogoUDG_New = LogoUDG.resize((150,150))

render = ImageTk.PhotoImage(LogoUDG_New)
Img_1= Label(raiz,image=render,background="white")
Img_1.image =render

Img_1.grid(row=1,column=3,pady=5)

#_______________________________________________________________________________________________



#____________________________Labels__________________________________________________________
#Label de nombre
Nombre = Label(raiz, font="Arial 30",text="Nombre: ",justify='right',height=2,bg="#312FC3")
Nombre.grid(row=1,column=1)

#Label de Auto
Auto = Label(raiz, font="Arial 30",text="Auto: ",justify='center',height=2,width=10,bg="#312FC3")
Auto.grid(row=2,column=1,padx=10)

#Label de Placas
ID = Label(raiz, font="Arial 30",text="Placas: ",justify='center',height=2,width=10,bg="#312FC3")
ID.grid(row=3,column=1)

#Label de Hora
Hora = Label(raiz, font="Arial 30",text="Hora: ",justify='center',height=2,width=10,bg="#312FC3")
Hora.grid(row=4,column=1)

#Label de Fecha
Fecha = Label(raiz, font="Arial 30",text="Fecha: ",justify='center',height=2,width=10,bg="#312FC3")
Fecha.grid(row=5,column=1)

#Label de Modulo 
Modulo = Label(raiz, font="Arial 30",text="Modulo: ",justify='center',height=2,width=10,bg="#312FC3")
Modulo.grid(row=6,column=1)

#Label de Color
Color = Label(raiz, font="Arial 30",text="Color: ",justify='center',height=2,width=10,bg="#312FC3")
Color.grid(row=7,column=1)

#Label de Entrada
Entrada = Label(raiz, font="Arial 30",text="Entrada: ",justify='center',height=2,width=10,bg="#312FC3")
Entrada.grid(row=8,column=1)


#____________________________Entrys__________________________________________________________


#Entry para el name con tamaño y fuente 
InputName = Entry(raiz,font="Arial 25",borderwidth=1)
InputName.grid(row=1, column=2,padx=10)

#Insertar Auto
InputCar = Entry(raiz,font="Arial 25",borderwidth=1)
InputCar.grid(row=2,column=2)

#Insertar Placas
InputID = Entry(raiz,font="Arial 25",borderwidth=1)
InputID.grid(row=3,column=2)

#Insertar Hora
InputHour = Entry(raiz,font="Arial 25",borderwidth=1)
InputHour.grid(row=4,column=2)

#Insertar Fecha
InputDate = Entry(raiz,font="Arial 25",borderwidth=1)
InputDate.grid(row=5,column=2)

#Insertar Modulo 
InputPlace = ttk.Combobox(raiz,font="Arial 23",state="readonly",values=["A","B","C","D","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","S1","T","U","V","V1","W","X","Y","Z"])
#InputPlace = Entry(raiz,font="Arial 25",borderwidth=1)
InputPlace.grid(row=6,column=2)

#Insertar Color
InputColor = Entry(raiz,font="Arial 25",borderwidth=1)
InputColor.grid(row=7,column=2)

#Insertar Entrada
InputGate = ttk.Combobox(raiz,font="Arial 23",state="readonly",values=["Blvd. Gral. Marcelino García Barragán","Calz. Olimpica","Calz. Revolucion"])
InputGate.grid(row=8,column=2)

#______________________Botones____________________________________

#Boton de Registro de auto 
BotonRegistrar = tk.Button(raiz,font="Arial 16",text="Registrar",height=3,width=30,borderwidth=0,bg="#FD5C16",command=Registrar)
BotonRegistrar.grid(row=2,column=3,padx=10)

#Boton de Limpiar registros 
BotonLimpiar = tk.Button(raiz,font="Arial 16",text="Limpiar Registro",height=3,width=30,borderwidth=0,bg="#FD5C16",command=limpiar)
BotonLimpiar.grid(row=3,column=3)

#Salir
BotonSalir= tk.Button(raiz,font="Arial 16",text="Salir",height=2,width=30,borderwidth=0,bg="#FD5C16",command=Salir)
BotonSalir.grid(row=4,column=3)

#______________________Botones____________________________________





obtener_Tiempo()
raiz.mainloop()