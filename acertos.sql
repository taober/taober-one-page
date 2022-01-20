
	SELECT d.id, e.nome, e.dominio, d.empreendimento_id, COUNT(*) qtd 
	FROM descricoes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
	GROUP BY 3 ORDER BY 4 desc;

select * FROM empreendimentos WHERE id IN (93,130);

SELECT 
d.titulo, 
d.texto, 
d.titulo2, 
d.texto, 
d.texto2, 
d.fundo, 
d.ativo 
FROM detalhes d INNER JOIN empreendimentos e ON e. id = d.empreendimento_id;




UPDATE detalhes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
SET
e.detalhe_titulo = d.titulo, 
e.detalhe_texto = d.texto, 
e.detalhe_titulo_2 = d.titulo2, 
e.detalhe_texto_2 = d.texto2, 
e.detalhe_fundo = d.fundo, 
e.detalhe_ativo = d.ativo ;
WHERE e.id = 130;


UPDATE descricoes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
SET
e.detalhe_titulo = d.titulo, 
e.detalhe_texto = d.texto, 
e.detalhe_titulo_2 = d.titulo2, 
e.detalhe_texto_2 = d.texto2, 
e.detalhe_fundo = d.fundo, 
e.detalhe_ativo = d.ativo ;
WHERE e.id = 130;

UPDATE descricoes d INNER JOIN empreendimentos e ON e.id = d.empreendimento_id
SET
e.descricao_titulo = d.titulo, 
e.descricao_texto = d.texto, 
e.descricao_titulo_2 = d.titulo2, 
e.descricao_texto_2 = d.texto2, 
e.descricao_fundo = d.fundo;
WHERE e.id = 130;


SELECT * FROM empreendimentos WHERE id = 404;



SELECT e.descricao_site, d.texto 
FROM empreendimentos e inner JOIN descricoes d ON e.id = d.empreendimento_id 
WHERE e.id = 404;