xml
<wsdl:definitions name="CashbackService"
                  targetNamespace="http://localhost/cashback"
                  xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
                  xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/"
                  xmlns:tns="http://localhost/cashback"
                  xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <wsdl:types>
        <xsd:schema targetNamespace="http://localhost/cashback">
            <xsd:element name="ClaimCashbackRequest">
                <xsd:complexType>
                    <xsd:sequence>
                        <xsd:element name="order_id" type="xsd:int"/>
                    </xsd:sequence>
                </xsd:complexType>
            </xsd:element>
            <xsd:element name="ClaimCashbackResponse">
                <xsd:complexType>
                    <xsd:sequence>
                        <xsd:element name="status" type="xsd:string"/>
                        <xsd:element name="message" type="xsd:string"/>
                        <xsd:element name="cashback" type="xsd:float" minOccurs="0"/>
                    </xsd:sequence>
                </xsd:complexType>
            </xsd:element>
        </xsd:schema>
    </wsdl:types>
    <wsdl:message name="ClaimCashbackRequest">
        <wsdl:part name="parameters" element="tns:ClaimCashbackRequest"/>
    </wsdl:message>
    <wsdl:message name="ClaimCashbackResponse">
        <wsdl:part name="parameters" element="tns:ClaimCashbackResponse"/>
    </wsdl:message>
    <wsdl:portType name="CashbackServicePortType">
        <wsdl:operation name="ClaimCashback">
            <wsdl:input message="tns:ClaimCashbackRequest"/>
            <wsdl:output message="tns:ClaimCashbackResponse"/>
        </wsdl:operation>
    </wsdl:portType>
    <wsdl:binding name="CashbackServiceBinding" type="tns:CashbackServicePortType">
        <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
        <wsdl:operation name="ClaimCashback">
            <soap:operation soapAction="http://localhost/cashback/ClaimCashback"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
    </wsdl:binding>
    <wsdl:service name="CashbackService">
        <wsdl:port name="CashbackServicePort" binding="tns:CashbackServiceBinding">
            <soap:address location="http://localhost/cashback/server.php"/>
        </wsdl:port>
    </wsdl:service>
</wsdl:definitions>
