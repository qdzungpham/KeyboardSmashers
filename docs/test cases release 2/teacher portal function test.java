package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.testng.annotations.*;
import static org.testng.Assert.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TeacherPortalFunction {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @BeforeClass(alwaysRun = true)
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://pinelands-music.tk/music_school/home.php";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testTeacherPortalFunction() throws Exception {
    driver.get(baseUrl + "/music_school/portal/teacherportal/index.php");
    driver.findElement(By.linkText("Teacher Area")).click();
    driver.findElement(By.linkText("My Profile")).click();
    driver.findElement(By.linkText("My Timetable")).click();
    driver.findElement(By.xpath("(//button[@type='button'])[5]")).click();
    driver.findElement(By.linkText("Learning Materials")).click();
    new Select(driver.findElement(By.name("class"))).selectByVisibleText("PIA101");
    driver.findElement(By.name("title")).clear();
    driver.findElement(By.name("title")).sendKeys("hello guys");
    driver.findElement(By.name("content")).clear();
    driver.findElement(By.name("content")).sendKeys("welcome to my class");
    driver.findElement(By.name("annoucement")).click();
    driver.findElement(By.linkText("Student Contacts")).click();
    driver.findElement(By.linkText("Tools")).click();
  }

  @AfterClass(alwaysRun = true)
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
