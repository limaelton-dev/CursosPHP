<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\{Student, Phone};
use Alura\Pdo\Domain\Repository\StudentRepository;
use DateTimeImmutable;
use DateTimeInterface;
use PDOStatement;
use PDO;

class PdoStudentRepository implements StudentRepository

{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $sqlQuery = 'SELECT * FROM students;';
        $stmt = $this->connection->query($sqlQuery);
        
        return $this->hydrateStudentList($stmt);
    }

    public function studentsBirthAt(DateTimeInterface $birthDate): array //buscando alunos por data
    {
        $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
    }

    private function hydrateStudentList(PDOStatement $stmt): array
    {
        $studentDataList = $stmt->fetchAll();
        $studentList = [];
        
            foreach($studentDataList as $studentData) {
            //$student = new Student(
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new DateTimeImmutable($studentData['birth_date'])
            );

            //$this->fillPhonesOf($student);

            //$studentList[] = $student;
        }

        return $studentList;
    }
/*
    private function fillPhonesOf(Student $student):void 
    {
        $sqlQuery = 'SELECT id, area_code, number FROM phones WHERE student_id = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $student->id(), \PDO::PARAM_INT);
        $stmt->execute();

        $phoneDataList = $stmt->fetchAll();

        foreach($phoneDataList as $phoneData ) {
            $phone = new Phone(
                $phoneData['id'],
                $phoneData['area_code'],
                $phoneData['number']
            );

        $student->addPhone($phone);
    }

    }
*/
    public function save(Student $student): bool
    {
        if($student->id() === null) {
            return $this->insert($student);
        }

        return $this->update($student);
        
    }

    public function insert(Student $student): bool
    {
        $insertQuery = 'INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);'; //aqui poderia ter colocado o ?
        $stmt = $this->connection->prepare($insertQuery);
        

        $sucess = $stmt->execute([ //uma nova forma de passar parâmetros, se fosse com '?', não precisaria informar os indices, assim com um array numérico
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d'),
        ]);

        if ($sucess) {
            $student->defineId($this->connection->lastInsertId()); //o pdo oferece esse método
        }
        return $sucess;
    }

    public function update(Student $student): bool
    {
        $updateQuery = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name', $student->name());
        $stmt->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function remove(Student $student): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM students WHERE id = ?;');
        $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function studentsWithPhones(): array
    {
        //Como trazer dados de duas tabelas ao mesmo tempo
        $sqlQuery = 'SELECT students.id, 
                            students.name, 
                            students.birth_date,
                            phones.id AS phone_id,
                            phones.area_code,
                            phones.number
                    FROM students
                    JOIN phones ON students.id = phones.student_id;';
        $stmt = $this->connection->query($sqlQuery);
        $result = $stmt->fetchAll();
        //precisamos mapear para cada aluno que tem mais de uma telefone, apenas um espaço
        $studentList = [];
        foreach($result as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['name'],
                    new \DateTimeImmutable($row['birth_date'])
                );
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);
        }

        return $studentList;
    }
}