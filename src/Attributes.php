<?php
/*
 * Authentication.Gov — A PHP API to parse data from https://www.autenticacao.gov.pt/.
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following link to read about the usage policies and the license of
 * Autenticação.Gov before using this library:
 *
 * @see https://www.autenticacao.gov.pt/web/guest/termos-e-condicoes
 */

namespace Dipcode;

/**
 * Base class for Attributes definition
 */
class Attributes
{
    /**
     * @var array Default attributes
     */
    private static $attributes = array(
        'NIC' => 'http://interop.gov.pt/MDC/Cidadao/NIC',
        'NomeProprio' => 'http://interop.gov.pt/MDC/Cidadao/NomeProprio',
        'NomeApelido' => 'http://interop.gov.pt/MDC/Cidadao/NomeApelido',
        'DataNascimento' => 'http://interop.gov.pt/MDC/Cidadao/DataNascimento',
        'NomeCompleto' => 'http://interop.gov.pt/MDC/Cidadao/NomeCompleto',
        'NIF' => 'http://interop.gov.pt/MDC/Cidadao/NIF',
        'NISS' => 'http://interop.gov.pt/MDC/Cidadao/NISS',
        'NSNS' => 'http://interop.gov.pt/MDC/Cidadao/NSNS',
        'NIFCifrado' => 'http://interop.gov.pt/MDC/Cidadao/NIFCifrado',
        'NISSCifrado' => 'http://interop.gov.pt/MDC/Cidadao/NISSCifrado',
        'NICCifrado' => 'http://interop.gov.pt/MDC/Cidadao/NICCifrado',
        'NSNSCifrado' => 'http://interop.gov.pt/MDC/Cidadao/NSNSCifrado',
        'Sexo' => 'http://interop.gov.pt/MDC/Cidadao/Sexo',
        'Nacionalidade' => 'http://interop.gov.pt/MDC/Cidadao/Nacionalidade',
        'CorreioElectronico' => 'http://interop.gov.pt/MDC/Cidadao/CorreioElectronico',
        'TituloAcademico' => 'http://interop.gov.pt/MDC/Cidadao/TituloAcademico',
        'Pseudonimo' => 'http://interop.gov.pt/MDC/Cidadao/Pseudonimo',
        'Idade' => 'http://interop.gov.pt/MDC/Cidadao/Idade',
        'IdadeSuperiorA' => 'http://interop.gov.pt/MDC/Cidadao/IdadeSuperiorA',
        'MoradaCanonica' => 'http://interop.gov.pt/MDC/Cidadao/MoradaCanonica',
        'DocumentoAssinado' => 'http://interop.gov.pt/MDC/Cidadao/DocumentoAssinado',
        'CertificadoX509Cidadao' => 'http://interop.gov.pt/MDC/Cidadao/CertificadoX509Cidadao',
        'TextoMorada' => 'http://interop.gov.pt/MDC/Cidadao/TextoMorada',
        'Titulo' => 'http://interop.gov.pt/MDC/Cidadao/Titulo',
        'AutorizacaoResidencia' => 'http://interop.gov.pt/MDC/Cidadao/AutorizacaoResidencia',
        'Contactos' => 'http://interop.gov.pt/MDC/Cidadao/Contactos',
        'NivelConfiancaAutenticacaoCidadao' => 'http://interop.gov.pt/MDC/Cidadao/NivelConfiancaAutenticacaoCidadao',
        'NumeroSerie' => 'http://interop.gov.pt/MDC/Cidadao/NumeroSerie',
        'Tipo de Documento' => 'http://interop.gov.pt/MDC/Cidadao/DocType',
        'Nacionalidade do Documento' => 'http://interop.gov.pt/MDC/Cidadao/DocNationality',
        'Número do Documento' => 'http://interop.gov.pt/MDC/Cidadao/DocNumber',
        'UID' => 'http://interop.gov.pt/MDC/Generico/UID',
        'Nome' => 'http://interop.gov.pt/MDC/Generico/Nome',
        'CorreioElectronico' => 'http://interop.gov.pt/MDC/Generico/CorreioElectronico',
        'NumeroSerie' => 'http://interop.gov.pt/MDC/Generico/NumeroSerie',
        'Certificado' => 'http://interop.gov.pt/MDC/Generico/Certificado',
        'Sociedade' => 'http://interop.gov.pt/MDC/Advogado/Sociedade',
        'NSociedade' => 'http://interop.gov.pt/MDC/Advogado/NSociedade',
        'NomeProfissional' => 'http://interop.gov.pt/MDC/Advogado/NomeProfissional',
        'NOA' => 'http://interop.gov.pt/MDC/Advogado/NOA',
        'CorreioElectronico' => 'http://interop.gov.pt/MDC/Advogado/CorreioElectronico',
        'NomeCompleto' => 'http://interop.gov.pt/MDC/Advogado/NomeCompleto',
        'NumeroSerie' => 'http://interop.gov.pt/MDC/Advogado/NumeroSerie',
        'NCS' => 'http://interop.gov.pt/MDC/Solicitador/NCS',
        'NomeCompleto' => 'http://interop.gov.pt/MDC/Solicitador/NomeCompleto',
        'CorreioElectronico' => 'http://interop.gov.pt/MDC/Solicitador/CorreioElectronico',
        'NumeroSerie' => 'http://interop.gov.pt/MDC/Solicitador/NumeroSerie',
        'NON' => 'http://interop.gov.pt/MDC/Notario/NON',
        'NomeProprio' => 'http://interop.gov.pt/MDC/Notario/NomeProprio',
        'NomeCompleto' => 'http://interop.gov.pt/MDC/Notario/NomeCompleto',
        'NomeApelido' => 'http://interop.gov.pt/MDC/Notario/NomeApelido',
        'NumeroSerie' => 'http://interop.gov.pt/MDC/Notario/NumeroSerie',
        'NomeCartorioNotarial' => 'http://interop.gov.pt/MDC/Notario/NomeCartorioNotarial',
        'LocalidadeCartorioNotarial' => 'http://interop.gov.pt/MDC/Notario/LocalidadeCartorioNotarial',
        'DistritoCartorioNotarial' => 'http://interop.gov.pt/MDC/Notario/DistritoCartorioNotarial',
        'Nacionalidade' => 'http://interop.gov.pt/MDC/Notario/Nacionalidade',
        'CorreioElectronico' => 'http://interop.gov.pt/MDC/Notario/CorreioElectronico',
        'Foto' => 'http://interop.gov.pt/MDC/Cidadao/Foto',
        'DataValidade' => 'http://interop.gov.pt/MDC/Cidadao/DataValidade',
        'Altura' => 'http://interop.gov.pt/MDC/Cidadao/Altura',
        'NomeProprioPai' => 'http://interop.gov.pt/MDC/Cidadao/NomeProprioPai',
        'NomeApelidoPai' => 'http://interop.gov.pt/MDC/Cidadao/NomeApelidoPai',
        'NomeProprioMae' => 'http://interop.gov.pt/MDC/Cidadao/NomeProprioMae',
        'NomeApelidoMae' => 'http://interop.gov.pt/MDC/Cidadao/NomeApelidoMae',
        'IndicacoesEventuais' => 'http://interop.gov.pt/MDC/Cidadao/IndicacoesEventuais',
        'NoDocumento' => 'http://interop.gov.pt/MDC/Cidadao/NoDocumento',
        'mrz1' => 'http://interop.gov.pt/MDC/Cidadao/mrz1',
        'mrz2' => 'http://interop.gov.pt/MDC/Cidadao/mrz2',
        'mrz3' => 'http://interop.gov.pt/MDC/Cidadao/mrz3',
        'VersaoCartao' => 'http://interop.gov.pt/MDC/Cidadao/VersaoCartao',
        'CartaoPAN' => 'http://interop.gov.pt/MDC/Cidadao/CartaoPAN',
        'DataEmissao' => 'http://interop.gov.pt/MDC/Cidadao/DataEmissao',
        'EntidadeEmissora' => 'http://interop.gov.pt/MDC/Cidadao/EntidadeEmissora',
        'TipoDocumento' => 'http://interop.gov.pt/MDC/Cidadao/TipoDocumento',
        'LocalDePedido' => 'http://interop.gov.pt/MDC/Cidadao/LocalDePedido',
        'Versao' => 'http://interop.gov.pt/MDC/Cidadao/Versao',
        'Distrito' => 'http://interop.gov.pt/MDC/Cidadao/Distrito',
        'Concelho' => 'http://interop.gov.pt/MDC/Cidadao/Concelho',
        'Freguesia' => 'http://interop.gov.pt/MDC/Cidadao/Freguesia',
        'AbrTipoDeVia' => 'http://interop.gov.pt/MDC/Cidadao/AbrTipoDeVia',
        'TipoDeVia' => 'http://interop.gov.pt/MDC/Cidadao/TipoDeVia',
        'DesignacaoDaVia' => 'http://interop.gov.pt/MDC/Cidadao/DesignacaoDaVia',
        'AbrTipoEdificio' => 'http://interop.gov.pt/MDC/Cidadao/AbrTipoEdificio',
        'TipoEdificio' => 'http://interop.gov.pt/MDC/Cidadao/TipoEdificio',
        'NumeroPorta' => 'http://interop.gov.pt/MDC/Cidadao/NumeroPorta',
        'Andar' => 'http://interop.gov.pt/MDC/Cidadao/Andar',
        'Lado' => 'http://interop.gov.pt/MDC/Cidadao/Lado',
        'Lugar' => 'http://interop.gov.pt/MDC/Cidadao/Lugar',
        'Localidade' => 'http://interop.gov.pt/MDC/Cidadao/Localidade',
        'CodigoPostal4' => 'http://interop.gov.pt/MDC/Cidadao/CodigoPostal4',
        'CodigoPostal3' => 'http://interop.gov.pt/MDC/Cidadao/CodigoPostal3',
        'LocalidadePostal' => 'http://interop.gov.pt/MDC/Cidadao/LocalidadePostal',
        'BlocoNotas' => 'http://interop.gov.pt/MDC/Cidadao/BlocoNotas',
        'NumeroDeControlo' => 'http://interop.gov.pt/MDC/Cidadao/NumeroDeControlo',
        'eEstudante' => 'http://interop.gov.pt/MDC/Cidadao/eEstudante',
        'status' => 'http://interop.gov.pt/MDC/Cidadao/status',
        'numeroFiscal' => 'http://interop.gov.pt/MDC/Cidadao/numeroFiscal',
        'enderecoRegistadoCanonico' => 'http://interop.gov.pt/MDC/Cidadao/enderecoRegistadoCanonico',
        'temGrauAcademico' => 'http://interop.gov.pt/MDC/Cidadao/temGrauAcademico',
        'nomeLegal' => 'http://interop.gov.pt/MDC/Cidadao/nomeLegal',
        'habilitacao' => 'http://interop.gov.pt/MDC/Cidadao/habilitacao',
        'eIdentificadorPessoaLegal' => 'http://interop.gov.pt/MDC/Cidadao/eIdentificadorPessoaLegal',
        'tipoTraduzivel' => 'http://interop.gov.pt/MDC/Cidadao/tipoTraduzivel',
        'acTitulo' => 'http://interop.gov.pt/MDC/Cidadao/acTitulo',
        'eCoordenadorCurso' => 'http://interop.gov.pt/MDC/Cidadao/eCoordenadorCurso',
        'suplementoDiploma' => 'http://interop.gov.pt/MDC/Cidadao/suplementoDiploma',
        'nomeAlternativo' => 'http://interop.gov.pt/MDC/Cidadao/nomeAlternativo',
        'eStaffAcademico' => 'http://interop.gov.pt/MDC/Cidadao/eStaffAcademico',
        'enderecoRegistado' => 'http://interop.gov.pt/MDC/Cidadao/enderecoRegistado',
        'tipo' => 'http://interop.gov.pt/MDC/Cidadao/tipo',
        'eProfessorDe' => 'http://interop.gov.pt/MDC/Cidadao/eProfessorDe',
        'informacaoContato' => 'http://interop.gov.pt/MDC/Cidadao/informacaoContato',
        'eStaffAdministrativo' => 'http://interop.gov.pt/MDC/Cidadao/eStaffAdministrativo',
        'atividade' => 'http://interop.gov.pt/MDC/Cidadao/atividade',
        'suplementoEstudosAtual' => 'http://interop.gov.pt/MDC/Cidadao/suplementoEstudosAtual',
        'isHealthcareProfessional' => 'http://interop.gov.pt/MDC/Cidadao/isHealthcareProfessional',
        'conteudoMandato' => 'http://interop.gov.pt/MDC/Cidadao/conteudoMandato',
        'pedidoDocumento' => 'http://interop.gov.pt/MDC/Cidadao/pedidoDocumento',
        'Passport' => 'http://interop.gov.pt/MDC/Cidadao/Passport',
        'NMECON' => 'http://interop.gov.pt/MDC/Notario/NMECON',
        'CargoDoTitular' => 'http://interop.gov.pt/MDC/ECCE/CargoDoTitular',
        'MicrosoftUpn' => 'http://interop.gov.pt/MDC/ECCE/MicrosoftUpn',
        'Ministerio' => 'http://interop.gov.pt/MDC/ECCE/Ministerio',
        'Nome' => 'http://interop.gov.pt/MDC/ECCE/Nome',
        'Organismo' => 'http://interop.gov.pt/MDC/ECCE/Organismo',
        'Pais' => 'http://interop.gov.pt/MDC/ECCE/Pais',
        'AlturaDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/Altura',
        'AssinaturaDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/Assinatura',
        'ContactosDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/ContactosXML',
        'CorreioElectronicoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/CorreioElectronico',
        'DataNascimentoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/DataNascimento',
        'DataValidadeDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/DataValidade',
        'FotoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/Foto',
        'IndicativoTelefoneMovelDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/IndicativoTelefoneMovel',
        'NacionalidadeDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/Nacionalidade',
        'NoDocumentoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NoDocumento',
        'NomeApelidoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeApelido',
        'NomeApelidoMaeDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeApelidoMae',
        'NomeApelidoPaiDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeApelidoPai',
        'NomeProprioDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeProprio',
        'NomeProprioMaeDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeProprioMae',
        'NomeProprioPaiDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NomeProprioPai',
        'NumeroTelefoneMovelDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/NumeroTelefoneMovel',
        'SexoDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/Sexo',
        'MoradaDadosCC' => 'http://interop.gov.pt/DadosCC/Cidadao/MoradaXML',
        'NomeADSE' => 'http://interop.gov.pt/ADSE/Cidadao/Nome',
        'NumeroBeneficiarioADSE' => 'http://interop.gov.pt/ADSE/Cidadao/NumeroBeneficiario',
        'QualidadeADSE' => 'http://interop.gov.pt/ADSE/Cidadao/Qualidade',
        'SituacaoADSE' => 'http://interop.gov.pt/ADSE/Cidadao/Situacao',
        'DataValidadeADSE' => 'http://interop.gov.pt/ADSE/Cidadao/DataValidade',
        'NomeProprioIMT' => 'http://interop.gov.pt/IMTT/Cidadao/NomeProprio',
        'NomeApelidoIMT' => 'http://interop.gov.pt/IMTT/Cidadao/NomeApelido',
        'LocalNascimentoIMT' => 'http://interop.gov.pt/IMTT/Cidadao/LocalNascimento',
        'DataNascimentoIMT' => 'http://interop.gov.pt/IMTT/Cidadao/DataNascimento',
        'NoCartaIMT' => 'http://interop.gov.pt/IMTT/Cidadao/NoCarta',
        'DataEmissaoIMT' => 'http://interop.gov.pt/IMTT/Cidadao/DataEmissao',
        'EntidadeEmissoraIMT' => 'http://interop.gov.pt/IMTT/Cidadao/EntidadeEmissora',
        'EstadoIMT' => 'http://interop.gov.pt/IMTT/Cidadao/Estado',
        'CategoriasIMT' => 'http://interop.gov.pt/IMTT/Cidadao/Categorias',
        'DigitoCartaIMT' => 'http://interop.gov.pt/IMTT/Cidadao/DigitoCarta',
        'DigitoControloIMT' => 'http://interop.gov.pt/IMTT/Cidadao/DigitoControlo',
        'NoControloIMT' => 'http://interop.gov.pt/IMTT/Cidadao/NoControlo',
        'NumeroTelemovel' => 'http://interop.gov.pt/MDC/Cidadao/NumeroTelemovel',
        'CodigoNacionalidade' => 'http://interop.gov.pt/MDC/Cidadao/CodigoNacionalidade',
        'PersonIdentifier' => 'http://eidas.europa.eu/attributes/naturalperson/PersonIdentifier',
        'FamilyName' => 'http://eidas.europa.eu/attributes/naturalperson/CurrentFamilyName',
        'FirstName' => 'http://eidas.europa.eu/attributes/naturalperson/CurrentGivenName',
        'DateOfBirth' => 'http://eidas.europa.eu/attributes/naturalperson/DateOfBirth',
        'CurrentAddress' => 'http://eidas.europa.eu/attributes/naturalperson/CurrentAddress',
        'Gender' => 'http://eidas.europa.eu/attributes/naturalperson/Gender',
        'PlaceOfBirth' => 'http://eidas.europa.eu/attributes/naturalperson/PlaceOfBirth',
        'SituacaoProfissional' => 'http://interop.gov.pt/SegurancaSocial/SituacaoProfissional'
    );

    public static function setAttributes(array $attributes)
    {
        self::$attributes = array_merge(self::$attributes, $attributes);
    }

    public static function getAttribute($name)
    {
        return array_key_exists($name, self::$attributes) ? self::$attributes[$name] : $name;
    }

    public static function getNameByAttribute($attribute)
    {
        return array_search($attribute, self::$attributes);
    }
}
