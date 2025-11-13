public class Programa {
    public static void main(String[] args) {
        System.out.println("Hello World");
        System.out.println("Hello Matheus");
        System.out.println("Hello Arthur");

        int resultado = soma(5, 7);
        System.out.println("Resultado da soma: " + resultado);
    }

    private static int soma(int a, int b) {
        return a + b;
    }
}
