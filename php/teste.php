procedure TForm1.Button1Click(Sender: TObject);
begin
if GetCertificadoNovo then
showmessage(ok)
else
showmessage(erro);
end;

function TForm1.GetCertificadoNovo: Boolean;
var
Store : IStore3;
CertsLista, CertsSelecionado : ICertificates2;
CertDados : ICertificate;
lSigner : TSigner;
lSignedData : TSignedData;
begin
Result := False;
Store := CoStore.Create;
Store.Open(CAPICOM_CURRENT_USER_STORE, My, CAPICOM_STORE_OPEN_MAXIMUM_ALLOWED);

CertsLista := Store.Certificates as ICertificates2;
CertsSelecionado := CertsLista.Select(Certificado(s) Digital(is) disponível(is), Selecione o Certificado Digital para uso no aplicativo, false);

if not(CertsSelecionado.Count = 0) then
begin
CertDados := IInterface(CertsSelecionado.Item[1]) as ICertificate2;
if CertDados.ValidFromDate > Now then
begin
showmessage(certificado não liberado. aguardar +datetostr(CertDados.ValidFromDate));
exit;
end;
if CertDados.ValidToDate < Now then
begin
showmessage(certificado expirado);
exit;
end;

if Pos(edtEmitCNPJ.text,CertDados.SubjectName) = 0 then
begin
showmessage(certificado pertencente a outra empresa / pessoa+chr(13)+CertDados.SubjectName);
exit;
end;

{ Configura o objeto responsável por fazer a assinatura,
informando qual é o certificado a ser usado e o conteúdo a ser assinado }
lSigner := TSigner.Create(self);
lSigner.Certificate := CertDados;

lSignedData := TSignedData.Create(self);
lSignedData.Content :=  ;


{ Solicita a senha }
lSignedData.Sign(lSigner.DefaultInterface, false, CAPICOM_ENCODE_BASE64);

Result := True;

lSignedData.Free;
lSigner.Free;
end;
end;