# Custom QR Code Generator (WordPress Plugin) 📱✨

[![WordPress](https://img.shields.io/badge/WordPress-Plugin-21759B?style=for-the-badge&logo=wordpress&logoColor=white)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.2-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)

Plugin desenvolvido para ecossistemas WordPress que permite a criação, personalização avançada e gerenciamento centralizado de QR Codes com estilização sob medida, suporte a inserção de logo centralizada, controle de cores e exportação em alta resolução.

---

## 🎯 Recursos Principais

- 🎨 **Estilização Visual Completa**: Configuração de cores de fundo (*background*) e dos módulos frontais (*foreground*).
- 🖼️ **Inclusão de Logotipo Central**: Permite inserir logotipo ou ícone no centro do QR Code mantendo o nível de legibilidade e correção de erros.
- 📐 **Tamanhos e Resoluções Personalizáveis**: Geração em dimensões sob medida para uso digital ou materiais impressos.
- 💾 **Persistência em Banco de Dados**: Criação automática de tabela nativa (`{wp_prefix}qr_generator`) durante a ativação do plugin para histórico de códigos gerados.
- 📊 **Painel Administrativo Nativo no WordPress**: Interface no menu do WP Admin com listagem, visualização, edição, exclusão e download direto.
- ⚡ **Geração em Tempo Real**: Renderização via biblioteca `qr-code-styling` no lado do cliente com pré-visualização instantânea antes de salvar.

---

## 📂 Estrutura de Arquivos

```text
new-qr/
├── custom-qr-code-generator.php   # Arquivo principal do plugin e hooks de ativação/desativação
├── admin.php                      # Registro da página de menu no WordPress Admin
├── index.php                      # Interface do gerador e visualizador
├── style.css                      # Estilos personalizados da interface
├── componet/                      # Endpoints e operações CRUD
│   ├── load.php                   # Carregamento e inicialização
│   ├── insert.php                 # Salva novo QR Code no banco
│   ├── select.php                 # Consulta de registro específico
│   ├── table.php                  # Renderização da listagem de QR Codes
│   └── delete.php                 # Remoção de registros
├── inc/                           # Includes e helpers do backend
│   ├── load-table.php
│   └── select-table.php
├── js/                            # Bibliotecas JavaScript e scripts da interface
│   └── qr-code-styling.js         # Engine de renderização vetorial de QR Codes
├── fonts/                         # Tipografias e ícones Font Awesome
└── img/                           # Ícones e marcas do plugin
```

---

## 🚀 Instalação e Ativação

### Manualmente via FTP ou Painel do Servidor

1. Baixe ou clone este repositório para o diretório de plugins do seu WordPress:
   ```bash
   cd wp-content/plugins/
   git clone <URL_DO_REPOSITORIO> new-qr
   ```
2. Acesse o painel administrativo do WordPress (`/wp-admin`).
3. Vá em **Plugins > Plugins Instalados**.
4. Localize **Custom QR Code Generator** e clique em **Ativar**.
5. O menu **QR Generator** aparecerá no menu lateral do painel de administração.

---

## ⚙️ Ciclo de Vida do Banco de Dados

- **Ativação (`cqr_activate`)**: Executa `dbDelta()` criando a tabela `{wp_prefix}qr_generator` com campos:
  - `id`: Identificador único auto-incremental.
  - `logo`: Caminho ou URL da logo embutida.
  - `value`: Conteúdo ou URL codificada.
  - `size`: Dimensão do QR Code (px).
  - `color_bk`: Cor de fundo em formato hexadecimal.
  - `color_ft`: Cor dos módulos do QR Code.
- **Desativação (`cqr_deactivate`)**: Remove a tabela temporária caso o plugin seja desativado.

---

## 👨‍💻 Autor

Desenvolvido por **[Eduardo Marcos R. da Silva](https://deveduardomrs.pro)**  
- LinkedIn: [linkedin.com/in/eduardomrs](https://www.linkedin.com/in/eduardomrs)  
- GitHub: [@EduardoMRS](https://github.com/EduardoMRS)
