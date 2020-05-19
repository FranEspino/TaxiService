
 CREATE TABLE choferes(
     matricula_chofer VARCHAR(100),
     nombre_chofer VARCHAR(100),
     dni_chofer DOUBLE,
     telefono_chofer VARHCAR(100),
     dirección_chofer VARCHAR(100),
     CONSTRAINT pk_chofer PRIMARY KEY(matricula_chofer)
)
ALTER TABLE choferes ADD foto_chofer VARCHAR(100)AFTER `dirección_chofer` 
 CREATE TABLE clientes(
     clave_cliente INT AUTO_INCREMENT, 
     matricula_chofer_f VARCHAR(100),
     nombre_cliente VARCHAR(100), 
     telefono_cliente VARCHAR(100), 
     coordenadas_cliente VARCHAR(100), 
     fechayhora_cliente TIMESTAMP DEFAULT
     CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
     CONSTRAINT pk_cliente PRIMARY KEY(clave_cliente)
     CONSTRAINT fk_chofer FOREIGN KEY(matricula_chofer_f)
     REFERENCES choferes(matricula_chofer)
 )


 SELECT nombre_cliente,nombre_chofer FROM clientes 
 INNER JOIN choferes ON clientes.matricula_chofer_f=choferes.matricula_chofer 