/// <reference types="cypress"/> 
describe('LogIn',()=>{
    it("LogIn",()=>{
        cy.visit('login')
        cy.get('[data-cy="heading-login"]').should("have.text","Iniciar Sesion")
        
        //COMPRUEBA QUE LOS CAMPOS usuario & password SEAN OBLIGATORIOS
        cy.get('[data-cy="login-form"]').submit();
        cy.get('[data-cy="error"]').should('exist').should("have.length",2 );
        // COMPRUEBA EXISTENCIA DE USUARIO
        cy.get('[data-cy="email-login"]').type("correo@correo.com")
        cy.get('[data-cy="login-form"]').submit();
        cy.get('[data-cy="error"]').should("not.have.length",2 )
    })
})