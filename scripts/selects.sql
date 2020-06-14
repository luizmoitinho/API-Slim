select * from tb_lojas;
select * from tb_produtos;

select L.nm_loja, P.nm_produto, P.preco_produto, P.qtd_produto
from tb_lojas as L left join tb_produtos as P
on (L.id_loja = P.id_loja);