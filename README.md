# O que é isto?
Este repositório contém a versão em PHP da ferramenta Trubby desenvolvida por Kaic Bastidas (tcK1), Laury Bueno (laurybueno) e Lucas Delboni (LucasDelboni).

O software disponível aqui foi desenvolvido em 2015 para o Bacharelado em Sistemas de Informação da EACH-USP.

# Como instalar?
O método recomendado de instalação é via Docker.

```
curl -o trubby-php.yml https://raw.githubusercontent.com/laurybueno/trubby-php/master/docker-compose-prod.yml

docker-compose -f trubby-php.yml up
```

# Sobre o Trubby
Um sistema de gerenciamento de estoque, receitas e caixa para empreendimentos gastronômicos de pequeno porte, como foodtrucks e quiosques.

O seu diferencial em relação aos produtos já existentes no
mercado seria a sincronização da quantidade de itens no estoque de ingredientes com a venda dos produtos, além de um sistema de alertas que notificariam o usuário que determinado produto está chegando em seu limite por falta de ingredientes.
